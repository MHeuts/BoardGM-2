<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
	
    protected $fillable = [
        'name',
    ];

    public function role(){
        return $this->belongsToMany('App\Models\Role', 'product_category');
    }
}

