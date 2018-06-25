<?php

use App\Order;
use Faker\Generator as Faker;

$factory->define(App\Report::class, function (Faker $faker) {
    $flag = true;
    //$order = null;
    while($flag){
        $order_id = $faker->numberBetween(1, 300);
        $order = Order::find($order_id);
        if(($order->work_master_id != null) and ($order->status == 3)){
            $flag = false;
        }
    }

    return [
        'master_id' => $order->work_master_id,
        'client_id' => $order->client_id,
        'order_id' => $order->id,
        'rating' => rand(0, 5),
        'report' => $faker->text
    ];
});
