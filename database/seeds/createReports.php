<?php

use Illuminate\Database\Seeder;

class createReports extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Report::class, 300)->create();
    }
}
