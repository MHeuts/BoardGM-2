<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use Searchable;
	
	public function searchableAs()
    {
        return 'product';
    }
	
    protected $table = 'product';
	
    protected $fillable = [
        'name', 'description', 'price', 'in_stock',
    ];

    public function category(){
        return $this->belongsToMany('App\Models\Category', 'product_category');
    }
}
