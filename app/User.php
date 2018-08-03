<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'email', 'password', 'isAdmin', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function diningtables() {
        return $this->belongsTo('App\DiningTable');
    }

    public function isAdmin() {
        return $this->isAdmin; // Akses ke atribut isAdmin di table User
    }

    public function checkDelete($id) {
        $order = Order::where('user_id', '=', $id)->get();
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
