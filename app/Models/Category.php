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
}
