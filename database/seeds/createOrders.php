<?php

use App\Master;
use Illuminate\Database\Seeder;

class createOrders extends Seeder
{

    public function getMasters(){
        $arr = [];
        for ($i = 0; $i < 8; $i++){
            $arr[] = random_int(1, 100);
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
        factory(App\Order::class, 60)->create()->each(function ($u){
            $u->masters()->attach($this->getMasters(), ['commentary' => 'Комментарий', 'price' => random_int(200, 9000), 'date' => '2018-06-14']);
            //$u->subways()->saveMany($this->getSubways());
            //$u->orders()->saveMany(factory(App\Order::class, ))
        });
    }
}
