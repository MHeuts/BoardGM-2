<?php

use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'product_id' => $faker->randomElement(Product::all()->pluck('id')->toArray()),
		'category_id' => $faker->randomElement(Category::all()->pluck('id')->toArray()),
    ];
});
