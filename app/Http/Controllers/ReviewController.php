<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Review;
use App\Product;
use App\Order;
use Illuminate\Support\Facades\Input;
use Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');
        $reviews = Review::paginate(8);
        $products = Product::all();
        if (!empty($keyword)) {
            $reviews = DB::table('reviews')
                ->join('products', 'reviews.product_id', '=', 'products.id')
                ->select('products.product_name as productName', 'products.id as productID', 'reviews.*')
                ->where('products.product_name', 'LIKE', "%$keyword%")
                ->paginate(8);
            // $reviews = Review::where('product_id', '=', $products->id)->paginate(8);
        } else {
            $reviews = Review::paginate(8);
        }
        return view('admin.reviews.index', compact('reviews'));
    }

    public function userReview($o_id, $p_id)
    {
        $order = Order::findOrFail($o_id);
        $product = Product::findOrFail($p_id);
        $review = Review::where([
            ['product_id', '=', $p_id],
            ['user_id', '=', Auth::user()->id]])->first();
        return view('members.review', compact('order', 'product', 'review'));
    }

    public function userInput($o_id, $p_id, Request $request)
    {
        // Method: POST (serupa dengan store)
        $this->validate($request, ['rating' => 'required', 'comment' => 'required|min:20']);
        Review::create([
            'product_id' => $p_id,
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'spam' => '0',
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now(),
        ]);
        return redirect()->route('user.order', ['id' => Auth::user()->id])->with('flash_message', 'Penilaian berhasil disimpan.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $review = Review::findOrFail($id);
        return view('admin.reviews.show', compact('review'));
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
        $review = Review::findOrFail($id);
        if (Input::has('submit-spam'))
        {
            $review->spam = Input::get('submit-spam');
            $review->save();
        }
        return redirect()->route('admin.reviews.index')->with('flash_message', 'Rating berhasil diperbarui.');
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
    }
}
