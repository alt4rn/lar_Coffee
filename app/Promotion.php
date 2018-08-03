<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = [
        'coupon', 'title', 'description', 'starting_date', 'end_date', 'minimum_payment', 'discount', 'active', 'image'
    ];
}
