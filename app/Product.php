<?php

namespace App;

use DB;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'product_name', 'product_description', 'product_price', 'category_id', 'image', 'active'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function reviews() 
    {
        return $this->hasMany('App\Review');
    }

    public function getImage($id)
    {
        $p=Product::find($id);
        $cobas=$p->images;
        foreach($cobas as $coba){
            return $coba->file_name;
        }
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        $hasil = $category->name;
        return $hasil;
    }

    public function recalculateRating()
    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating, 1);
        $this->rating_count = $reviews->count();
        $this->save();
    }

    public function checkDelete($id) {
        $order = DB::table('order_products as op')->where('op.product_id', '=', $id)->get();
        $result = count($order);
        if($result > 0)
        {
            return true;
        }
        else if($result <= 0)
        {
            return false;
        }
    }
}
