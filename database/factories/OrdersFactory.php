<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    $category = $faker->numberBetween(1, 4);
    switch ($category){
        case 1:
            $subcategory = $faker->numberBetween(1, 5);
            break;
        case 2:
            $subcategory = $faker->numberBetween(6, 10);
            break;
        case 3:
            $subcategory = $faker->numberBetween(11, 15);
            break;
        case 4:
            $subcategory = $faker->numberBetween(16, 20);
            break;
    }
    $master = $faker->numberBetween(0, 1);
    if($master == 1){
        $master_id = $faker->numberBetween(0, 100);
    } else {
        $master_id = null;
    }
    return [
        'sc_id' => 1,
        'master_id' => $master_id,
        'work_master_id' => null,
        'client_id' => $faker->numberBetween(1, 100),
        'category_id' => $category,
        'subcategory_id' => $subcategory,
        'subway_id' => $faker->numberBetween(1, 67),
        'price' => 1,
        'header' => $faker->title,
//        'header' => $faker->randomLetter,
        'description' => $faker->text,
        'amount' => $faker->numberBetween(200, 10000),
        'end_date' => $faker->dateTimeBetween('+0 days', '+1 year')->format("Y-m-d"),
        'address' => $faker->address,
        'safety' => $faker->numberBetween(0, 1),
        'status' => $faker->numberBetween(0, 3)
    ];
});
