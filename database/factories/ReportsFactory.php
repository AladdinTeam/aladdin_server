<?php

use App\Order;
use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    $flag = true;
    //$order = null;
    while($flag){
        $order_id = $faker->numberBetween(1, 60);
        $order = Order::find($order_id);
        if($order->master_id != null){
            $flag = false;
        }
    }

    return [
        'master_id' => $order->master_id,
        'client_id' => $order->client_id,
        'order_id' => $order->id,
        'rating' => rand(0, 5),
        'report' => $faker->text
    ];
});
