<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Product;
use App\Image;
use App\Category;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $sort = $request->get('sort_id');
        $category_sort = $request->get('category_sort_id');
        $products = Product::paginate(8);
        if(empty($sort) && empty($category_sort))
        {        
            return view('products', compact('products'));
        }
        else if(!empty($sort) && empty($category_sort))
        {
            if($sort == 1) // berdasarkan penjualan
            {
                $products = Product::orderBy('rating_count')->paginate(8);
            }
            else if($sort == 2) // berdasarkan terbaru
            {
                $products = Product::orderBy('created_at', 'desc')->paginate(8);
            }
            else if($sort == 3) // berdasarkan termurah
            {
                $products = Product::orderBy('product_price', 'asc')->paginate(8);
            }
            else if($sort == 4) // berdasarkan termahal
            {
                $products = Product::orderBy('product_price', 'desc')->paginate(8);
            }
            $products->withPath('/lar_Coffee/public/products?sort_id=' . $sort);
            return view('products', compact('products'));
        }
        else if (empty($sort) && !empty($category_sort))
        {
            $products = Product::where('category_id', '=', $category_sort)->paginate(8);
            $products->withPath('/lar_Coffee/public/products?category_sort_id=' . $category_sort);
            return view('products', compact('products'));
        }
        else if (!empty($sort) && !empty($category_sort))
        {
            if($sort == 1) // berdasarkan penjualan
            {
                $products = Product::where('category_id', '=', $category_sort)->orderBy('rating_count')->paginate(8);
            }
            else if($sort == 2) // berdasarkan terbaru
            {
                $products = Product::where('category_id', '=', $category_sort)->orderBy('created_at', 'desc')->paginate(8);
            }
            else if($sort == 3) // berdasarkan termurah
            {
                $products = Product::where('category_id', '=', $category_sort)->orderBy('product_price', 'asc')->paginate(8);
            }
            else if($sort == 4) // berdasarkan termahal
            {
                $products = Product::where('category_id', '=', $category_sort)->orderBy('product_price', 'desc')->paginate(8);
            }
            $products->withPath('/lar_Coffee/public/products?sort_id=' . $sort . '&category_sort_id=' . $category_sort);
            return view('products', compact('products'));
        }
        return view('products', compact('products', 'sort', 'category_sort'));
    }

    public function products(Request $request)
    {
        $keyword = $request->get('search');
        $products = Product::paginate(8);
        if (!empty($keyword)) {
            $products = Product::where('product_name', 'LIKE', "%$keyword%")->orderBy('active', 'desc')
                ->paginate(8);
        } else {
            $products = Product::orderBy('active', 'desc')->paginate(8);
        }
        return view('admin.products.index', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        $relatedProduct = Product::where('category_id', '=', $product->category_id)->where('id', '!=', $product->id)->orderBy('rating_cache', 'desc')->take(4)->get();
        return view('details', compact('product', 'relatedProduct'));
    }

    public function selectedCategory(Request $request, $id)
    {
        $sort = $request->get('sort_id');
        $products = Product::where('category_id', '=', $id)->paginate(8);
        return view('products', compact('products'));
    }

//    public function sortProducts($sId, $cId)
//    {
//        // Category Sort
//        if($cId == 'Normal')
//            $categories = Category::all();
//        else
//            $categories = Category::find($cId);
//        // Sort
//        if($sId == '1') // Sort By Popularity
//            $productsP = $categories->products()->orderBy('rating_count', 'desc')->get();
//        else if ($sId == '2') // Sort By Latest
//            $productsP = $categories->products()->orderBy('created_at', 'desc')->get();
//        else if ($sId == '3') // Sort By Highest Price
//            $productsP = $categories->products()->orderBy('product_price', 'desc')->get();
//        else if ($sId == '4') // Sort By Lowest Price
//            $productsP = $categories->products()->orderBy('product_price', 'asc')->get();
//        else
//            $productsP = Product::all();
//        return view('products', compact('productsP', 'categories'));
//    }

    // public function sorting(Request $request)
    // {
        // $categories = Category::all();
        // $cats = Category::all();
        // // Category Sort
        // if($request->category_id == 'Normal')
        //     $categories = Category::all();
        // else
        //     $categories = Category::find($request->category_id);
        // $products = Product::paginate(8);
        
        // Sort
        // if($request->sort_id == '1') // Urutkan berdasarkan Penjualan
            // $products = $categories->products()->orderBy('rating_count', 'desc')->get();
        //     $products->sortByDesc('rating_count');
        // else if ($request->sort_id == '2') // Urutkan berdasarkan Terbaru
            // $products = $categories->products()->orderBy('created_at', 'desc')->get();
        //     $products->sortByDesc('created_at');
        // else if ($request->sort_id == '3') // Urutkan berdasarkan Termurah
            // $products = $categories->products()->orderBy('product_price', 'desc')->get();
        //     $products->sortByDesc('product_price');
        // else if ($request->sort_id == '4') // Urutkan berdasarkan Termahal
            // $products = $categories->products()->orderBy('product_price', 'asc')->get();
            // $products->sortByAsc('product_price');
    //    print_r($products);
//        exit;
        // return view('products', compact('products'));
//        dd($categories);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['product_name' => 'required', 'product_description' => 'required', 
                                    'product_price' => 'required', 'image' => 'required|image']);
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('img/uploads/prod', $imageName);

        Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'rating_cache' => '3',
            'rating_count' => '0',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
            'image' => 'img/uploads/prod/'.$imageName,
        ]);
        
        return redirect('admin/products')->with('flash_message', 'Produk berhasil ditambahkan!');
    }

    public function activeProduct($id)
    {
        $product = Product::findOrFail($id);
        if($product->active == '0')
        {
            $product->active = '1';
            $product->save();
        }
        else if($product->active == '1')
        {
            $product->active = '0';
            $product->save();
        }
        return redirect()->route('admin.products.index')->with('flash_message', 'Status pengguna berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
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
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
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
        $product = Product::findOrFail($id);
        $this->validate($request, ['product_name' => 'required', 'product_description' => 'required', 'product_price' => 'required']);
        $data = $request->all();
        if(empty($request->hasFile('image')))
        {
            $data = $request->except('image');
            $product->update($data);
        }
        else
        {
            File::delete(public_path() . $product->image);
            $newImage = $request->image;
            $newImageName = time().'.'.$newImage->getClientOriginalExtension();
            $newImage->move('img/uploads/prod/', $newImageName);
            $data['image'] = 'img/uploads/prod/' . $newImageName;
            $product->update($data);
        }
        return redirect('admin/products/')->with('flash_message', 'Product updated!');
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
        $order = DB::table('order_products as op')->where('op.product_id', '=', $id)->get();
        $result = count($order);
        if($result > 0)
        {
            return redirect('admin/products')->with('error', 'Maaf. Produk tidak dapat dihapus.');
        }
        else if($result <= 0)
        {
            Product::destroy($id);
            return redirect('admin/products')->with('flash_message', 'Produk berhasil dihapus!');
        }
    }
}
