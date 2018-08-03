<?php

namespace App\Http\Controllers;

use File;
use Carbon\Carbon;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all(); // Buat bagian Our Specialities
        $products = Product::all();
        $popularDishes = $products->take(6)->sortByDesc('rating_count'); // Buat bagian Popular Dishes
        return view('home', compact('categories', 'popularDishes'));
    }

    public function categories(Request $request)
    {
        $keyword = $request->get('search');
        $categories = Category::paginate(8);
        if (!empty($keyword)) {
            $categories = Category::where('name', 'LIKE', "%$keyword%")->orderBy('active', 'desc')
                ->paginate(8);
        } else if (empty($keyword)) {
            $categories = Category::orderBy('active', 'desc')->paginate(8);
        }
        return view('admin.categories.index', compact('categories'));
    }

    public function activeCategory($id)
    {
        $category = Category::findOrFail($id);
        if($category->active == '0')
        {
            $category->active = '1';
            $category->save();
        }
        else if($category->active == '1')
        {
            $category->active = '0';
            $category->save();
        }
        return redirect()->route('admin.categories.index')->with('flash_message', 'Status kategori berhasil diperbarui.');
    }

    public function about()
    {
        return view('about');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required', 
    //         'description' => 'required', 
    //         'image' => 'required|image|mimes:jpeg,jpg|max:2048']);
    //     $data = $request->except('image');
    //     $imageName = time().'.'.$request->image->getClientOriginalExtension();
    //     $request->image->move(public_path('/img/cat/'), $imageName);
    //     $data['image'] = 'img/cat/' + $imageName;
    //     $category = Category::create($data);
    //     return redirect('admin/categories')->with('flash_message', 'Category added!');
    // }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'description' => 'required', 'image' => 'required|image']);
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('img/uploads/cat', $imageName);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => 'img/uploads/cat/'.$imageName,
        ]);
        
        return redirect('admin/categories')->with('flash_message', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category = Category::findOrFail($id);
        $this->validate($request, ['name' => 'required', 'description' => 'required']);
        $data = $request->all();
        if(empty($request->hasFile('image')))
        {
            print_r($request->image); exit();
            $data = $request->except('image');
            $category->update($data);
        }
        else
        {
            File::delete(public_path() . $category->image);
            $newImage = $request->image;
            $newImageName = time().'.'.$newImage->getClientOriginalExtension();
            $newImage->move('img/uploads/cat/', $newImageName);
            $data['image'] = 'img/uploads/cat/' . $newImageName;
            $category->update($data);
        }
        return redirect('admin/categories/')->with('flash_message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = DB::table('order_products as op')->join('products as p', 'op.product_id', '=', 'p.id')
                    ->where('p.category_id', '=', $id)->get();
        $result = count($order);
        if($result > 0)
        {
            return redirect('admin/categories')->with('error', 'Maaf. Kategori produk tidak dapat dihapus.');
        }
        else if($result <= 0)
        {
            Category::destroy($id);
            return redirect('admin/categories')->with('flash_message', 'Kategori produk berhasil dihapus!');
        }
    }
}
