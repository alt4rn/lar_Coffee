<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'product_id', 'file_name',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
