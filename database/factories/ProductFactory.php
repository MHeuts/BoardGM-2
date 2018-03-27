<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->words($nb = 3, $asText = true),
		'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
		'price' => $faker->randomNumber(2),
    ];
});
