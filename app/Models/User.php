<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;
use App\Models\UserRole;

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

    public function roles(){
        return $this->belongsToMany('App\Models\Role', 'user_role');
    }
	
	public function isAdmin(){
		$isAdmin = UserRole::where('user_id', '=', Auth::user()->id)->where('role_id', '=', 2)->first();
		
		 return $isAdmin;
	}
}
