<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use Carbon\Carbon;

class PromotionController extends Controller
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
        $promotions = Promotion::paginate(8);
        $dateNow = Carbon::Now();
        if (!empty($keyword)) 
        {
            $promotions = Promotion::where('coupon', '=', $keyword)->latest()->paginate(8);
            return view('admin.promotions.index', compact('promotions', 'dateNow'));
        } 
        else if (empty($keyword))
        {
            return view('admin.promotions.index', compact('promotions', 'dateNow'));
        }
    }

    public function promo()
    {
        $promotions = Promotion::where([ 
                ['starting_date', '<=', Carbon::today()->toDateString()], 
                ['end_date', '>=', Carbon::today()->toDateString()], 
                ['active', '=', '1'] 
            ])->latest()->paginate(10);
        return view('promo', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.promotions.create');
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
        $this->validate($request, ['title' => 'required', 'description' => 'required', 'coupon' => 'required', 
                                    'starting_date' => 'required', 'end_date' => 'required', 'minimum_payment' => 'required', 
                                    'discount' => 'required', 'image' => 'required|image', 'active' => 'required']);
        $image = $request->image;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('img/uploads/prod', $imageName);
        $discount = $request->discount * 0.01;

        Promotion::create([
            'coupon' => $request->coupon,
            'title' => $request->title,
            'description' => $request->description,
            'starting_date' => $request->starting_date,
            'end_date' => $request->end_date,
            'minimum_payment' => $request->minimum_payment,
            'discount' => $discount,
            'image' => 'img/uploads/pro/'.$imageName,
            'active' => $request->active,
            'created_at' => Carbon::Now(),
            'updated_at' => Carbon::Now()
        ]);

        return redirect()->route('admin.promotions')->with('flash_message', 'Promo baru berhasil dibuat!');
    }

    public function activePromo($id)
    {
        $promo = Promotion::findOrFail($id);
        if($promo->active == '0')
        {
            $promo->active = '1';
            $promo->save();
        }
        else if($promo->active == '1')
        {
            $promo->active = '0';
            $promo->save();
        }
        return redirect()->route('admin.promotions.index')->with('flash_message', 'Status promo berhasil diperbarui.');
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
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.show', compact('promotion'));
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
        $promotion = Promotion::findOrFail($id);
        return view('admin.promotions.edit', compact('promotion'));
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
