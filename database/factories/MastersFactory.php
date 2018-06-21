<?php

use Faker\Generator as Faker;

$factory->define(App\Master::class, function (Faker $faker) {
    $fakeFirstName = $faker->firstName;
    $fakeLastName = $faker->lastName;
    $fakeEmail = $faker->email;
    $fakeNumber = $faker->phoneNumber;
    $scID = json_decode(\App\Libraries\SafeCrow\SafeCrow::createUser($fakeNumber, $fakeEmail, $fakeFirstName, $fakeLastName))->id;
    return [
        'sc_id' => $scID,
        'phone' => $fakeNumber,
        'email' => $fakeEmail,
        'password' => null,
        'first_name' => $fakeFirstName,
        'last_name' => $fakeLastName,
    ];
});
