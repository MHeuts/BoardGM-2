<?php

use App\Models\UserRole;
use App\Models\User;
use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(UserRole::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement(User::all()->pluck('id')->toArray()),
		'role_id' => $faker->randomElement(Role::all()->pluck('id')->toArray()),
    ];
});
