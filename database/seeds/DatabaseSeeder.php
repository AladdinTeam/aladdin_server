<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(createSubway::class);
        $this->call(createCategory::class);
        $this->call(createSubcategory::class);
        //$this->call(createClients::class);
        //$this->call(createMasters::class);
        //$this->call(createOrders::class);
        //$this->call(createReports::class);
        //$this->call(createServices::class);
        $this->call(createTests::class);
    }
}
