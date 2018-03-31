<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
	
    protected $fillable = [
        'order_id', 'product_id',
    ];

    public function product(){
        return $this->hasOne('App\Models\product', 'id', 'product_id');
    }
}
