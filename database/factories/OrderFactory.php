<?php

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderState;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
		'user_id' => $faker->randomElement(User::all()->pluck('id')->toArray()),
		'product_id' => $faker->randomElement(Product::all()->pluck('id')->toArray()),
		'order_state_id' => $faker->randomElement(OrderState::all()->pluck('id')->toArray()),
    ];
});
