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
    $safeCrowID = 1;
    $clientID = $faker->numberBetween(1, 100);
    $amount = $faker->numberBetween(200, 10000);
    $header = $faker->title;
    if($master == 1){
        $master_id = $faker->numberBetween(1, 100);
    } else {
        $master_id = null;
    }
    $status = $faker->numberBetween(0, 3);
    if($status != 0){
        $wm = $faker->numberBetween(1, 100);
        $clientSafeCrowID = \App\Client::where('id', $clientID)->first()->sc_id;
        $masterSafeCrowID = \App\Master::where('id', $wm)->first()->sc_id;
        $safeCrowBody = json_decode(App\Libraries\SafeCrow\SafeCrow::createDeal($clientSafeCrowID, $masterSafeCrowID, ($amount * 100), $header));
        $safeCrowID = $safeCrowBody->id;
    } else {
        $wm = null;
    }
    return [
        'sc_id' => $safeCrowID,
        'master_id' => $master_id,
        'work_master_id' => $wm,
        'client_id' => $clientID,
        'category_id' => $category,
        'subcategory_id' => $subcategory,
        'subway_id' => $faker->numberBetween(1, 67),
        'price' => 1,
        'header' => $header,
//        'header' => $faker->randomLetter,
        'description' => $faker->text,
        'amount' => $amount,
        'end_date' => $faker->dateTimeBetween('+0 days', '+1 year')->format("Y-m-d"),
        'address' => $faker->address,
        'safety' => $faker->numberBetween(0, 1),
        'status' => $status
    ];
});
