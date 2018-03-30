<?php

use App\Models\OrderDetails;
use App\Models\Order;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetails::class, function (Faker $faker) {
    return [
		'order_id' => $faker->randomElement(Order::all()->pluck('id')->toArray()),
		'product_id' => $faker->randomElement(Product::all()->pluck('id')->toArray()),
		'qty' => $faker->numberBetween(1, 100),
    ];
});
