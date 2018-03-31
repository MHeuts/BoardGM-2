<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'address_id',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address(){
        return $this->belongsTo('App\Models\Address');
    }
}
