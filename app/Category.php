<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'image', 'active'
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function checkDelete($id) {
        $order = DB::table('order_products as op')->join('products as p', 'op.product_id', '=', 'p.id')
                    ->where('p.category_id', '=', $id)->get();
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
