<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
	
    protected $fillable = [
        'name', 'description', 'price'
    ];

    public function category(){
        return $this->belongsToMany('App\Models\Category', 'product_category');
    }
}
