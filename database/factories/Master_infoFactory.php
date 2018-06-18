<?php

use Faker\Generator as Faker;

$factory->define(App\Master_Info::class, function (Faker $faker) {
    $card = $faker->numberBetween(0, 3);
    if($card == 0){
        $card = null;
    }
    return [
        'birthdate' => $faker->date(),
        'experience' => $faker->text,
        'education' => $faker->text,
        'about' => $faker->text,
        'sale' => $faker->text,
        'status' => $faker->numberBetween(0, 1),
        'card_id' => $card
    ];
});
