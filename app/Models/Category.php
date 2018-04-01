<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use Searchable;
	
	public function searchableAs()
    {
        return 'category';
    }
	
    protected $table = 'category';
	
    protected $fillable = [
        'parent_id', 'name',
    ];
	
	public function parent() {

        return $this->hasOne('App\Models\Category', 'id', 'parent_id');

    }

    public function children() {

        return $this->hasMany('App\Models\Category', 'parent_id', 'id');

    }  

    public static function tree() {

        return static::with(implode('.', array_fill(0, 4, 'children')))->where('parent_id', '=', NULL)->get();

    }
}
