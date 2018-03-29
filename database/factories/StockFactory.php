<?php

use App\Models\Stock;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'product_id' => $faker->unique()->numberBetween(1, Product::count()),
		'in_stock' => $faker->numberBetween($min = 0, $max = 9000),
    ];
});
