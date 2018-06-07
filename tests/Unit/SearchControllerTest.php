<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaveOrder()
    {
        $response = $this->withSession(
            [
                'auth' => Crypt::encryptString(1),
                'user_type' => Crypt::encryptString(1),
                'id' => Crypt::encryptString(11),
                'login_data' => 'a:8:{s:10:"categories";s:1:"1";s:13:"subcategories";s:1:"1";s:6:"subway";s:1:"1";s:5:"price";s:1:"1";s:6:"header";s:16:"Сдохнуть";s:11:"description";s:14:"Красиво";s:6:"amount";s:4:"1000";s:6:"safety";s:2:"on";}'
            ]
        )->post('/search/save_order');

        $response = $this->assertDatabaseHas('orders', [
            'client_id' => 11,
            'category_id' => 1,
            'subcategory_id' => 1,
            'subway_id' => 1,
            'price' => 1,
            'header' => 'Сдохнуть',
            'description' => 'Красиво',
            'amount' => 1000,
            'safety' => 1
        ]);
        //$this->assertTrue(true);
    }

}
