<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'name', 'active'
    ];

    public function tables()
    {
        return $this->hasMany('App\Table');
    }
}
