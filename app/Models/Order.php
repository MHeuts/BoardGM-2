<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
	
    protected $fillable = [
        'user_id', 'order_state_id',
    ];

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'order_details');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function state(){
        return $this->hasOne('App\Models\OrderState', 'id', 'order_state_id');
    }

    public function orderDetails(){
        return $this->hasMany('App\Models\OrderDetails');
    }
}
