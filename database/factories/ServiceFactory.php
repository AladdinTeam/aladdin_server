<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'master_id' => $faker->numberBetween(1, 100),
        'name' => $faker->text,
        'price' => $faker->numberBetween(200,10000),
        'unit' => '',
        'verified' => 1
    ];
});
