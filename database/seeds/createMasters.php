<?php

use App\Subcategory;
use App\Subway;
use Illuminate\Database\Seeder;

class createMasters extends Seeder
{
    public function getSubcategories(){
        $arr = [];
        for ($i = 0; $i < 4; $i++){
            $arr[] = random_int(1, 20);
        }

        $sub = Subcategory::whereIn('id', $arr)->get();

        return $sub;
    }

    public function getSubways(){
        $arr = [];
        for ($i = 0; $i < 4; $i++){
            $arr[] = random_int(1, 67);
        }

        $sub = Subway::whereIn('id', $arr)->get();

        return $sub;
    }




    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Master_Info::class, 2)->create();
        factory(App\Master::class, 1)->create()->each(function ($u){
            $u->master_info()->save(factory(App\Master_Info::class)->make());
            $u->subcategories()->saveMany($this->getSubcategories());
            $u->subways()->saveMany($this->getSubways());
            //$u->orders()->saveMany(factory(App\Order::class, ))
        });

        /*DB::table('masters')->insert(
            [
                'sc_id' => 2554,
                'phone' => 79213877640,
                'email' => 'v.a.volkov@icloud.com',
                'password' => null,
                'first_name' => 'Victor',
                'last_name' => 'Volkov',
            ]
        );*/
    }
}
