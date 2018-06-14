<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        'sc_id' => 1,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'password' => null,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
    ];
});
