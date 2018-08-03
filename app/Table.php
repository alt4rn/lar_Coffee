<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    //
    protected $fillable = [
        'x', 'y', 'active'
    ];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
