<?php

use Illuminate\Database\Seeder;


class createClients extends Seeder
{
    static $ClientsCount = 100;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Client::class, $this::$ClientsCount)->create();
    }
}
