<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'zipcode' => $faker->postcode,
		'city' => $faker->city,
    ];
});
