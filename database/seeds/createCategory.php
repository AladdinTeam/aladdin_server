<?php

use Illuminate\Database\Seeder;

class createCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Мелкий ремонт',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Курьер',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Уборка',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('categories')->insert([
            'id' => 4,
            'name' => 'Грузоперевозки',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);
    }
}
