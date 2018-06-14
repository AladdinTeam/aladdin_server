<?php

use Illuminate\Database\Seeder;

class createSubcategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 1,
            'name' => 'Сантехник',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 1,
            'name' => 'Электрик',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 1,
            'name' => 'Мастер на час',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 1,
            'name' => 'Отделочные работы',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 1,
            'name' => 'Сборка и ремонт мебели',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 2,
            'name' => 'Пешком',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 2,
            'name' => 'На авто',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 2,
            'name' => 'Купить и доставить',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 2,
            'name' => 'Курьер на день',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 2,
            'name' => 'Срочная доставка',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 3,
            'name' => 'Влажная уборка',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 3,
            'name' => 'Вывоз мусора',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 3,
            'name' => 'Генеральная уборка',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 3,
            'name' => 'Мытье окон',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 3,
            'name' => 'Глажка',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 4,
            'name' => 'Эвакуатор',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 4,
            'name' => 'Помощь в переезде',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 4,
            'name' => 'Пассажирские перевозки',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 4,
            'name' => 'Междугородние перевозки',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);

        DB::table('subcategories')->insert([
            'id' => $i++,
            'category_id' => 4,
            'name' => 'Грузчики',
            'image_url' => '',
            'created_at' => '2018-06-14 14:25:00',
            'updated_at' => '2018-06-14 14:25:00'
        ]);
    }
}
