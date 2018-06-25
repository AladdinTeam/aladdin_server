<?php

use App\Master;
use Illuminate\Database\Seeder;

class createOrders extends Seeder
{

    public function getMasters($order){
        $arr = [];
        for ($i = 0; $i < 8; $i++){
            $arr[] = random_int(1, 100);
        }

        if($order->work_master_id != null){
            $arr[] = $order->work_master_id;
        }

        $sub = Master::whereIn('id', $arr)->get();

        return $sub;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Order::class, 300)->create()->each(function ($u){
            $u->masters()->attach($this->getMasters($u), ['commentary' => 'Комментарий', 'price' => random_int(200, 9000), 'date' => '2018-06-14']);
            //$u->subways()->saveMany($this->getSubways());
            //$u->orders()->saveMany(factory(App\Order::class, ))
        });
    }
}
