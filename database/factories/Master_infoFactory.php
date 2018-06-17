<?php

use Faker\Generator as Faker;

$factory->define(App\Master_Info::class, function (Faker $faker) {
    return [
        'birthdate' => $faker->date(),
        'experience' => $faker->text,
        'education' => $faker->text,
        'about' => $faker->text,
        'sale' => $faker->text,
        'status' => $faker->numberBetween(0, 1),
        'card_id' => $faker->numberBetween(0,3)
    ];
});
