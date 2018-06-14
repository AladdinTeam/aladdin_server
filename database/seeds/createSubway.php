<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class createSubway extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sabways')->insert([
            'name' => 'Адмиралтейская',
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}