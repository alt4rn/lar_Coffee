<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id',
        're_name',
        're_address',
        're_phone',
        'status',
        'delivery_method',
        'delivery_cost',
        'discount',
        'sub_total',
        'total',
    ];

    public function products() {
        return $this->belongsToMany('App\Product');
    }

    public function details() {
        return $this->hasMany('App\Order_Product');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function orderProducts() {
        return $this->hasMany('App\OrderProduct');
    }

    public function getUserName($id) {
        $user = User::find($id);
        $hasil = $user->name;
        return $hasil;
    }

    public function getUserAddress($id) {
        $user = User::find($id);
        $hasil = $user->address;
        return $hasil;
    }

    public function getUserPhone($id) {
        $user = User::find($id);
        $hasil = $user->phone;
        return $hasil;
    }

    public function getProductName($id) {
        $product = Product::find($id);
        $result = $product->product_name;
        return $result;
    }
}
