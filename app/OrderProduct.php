<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    //
    protected $table = 'order_products';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id', 'product_id', 'selling_price', 'quantity'
    ];

    public function order() {
        return $this->belongsToMany('App\Order', 'order_products', 'order_id', 'product_id');
    }

    public function product() {
        return $this->belongsToMany('App\Product');
    }
}
