<?php

namespace App\Http\Controllers;

use App\Libraries\SafeCrow\SafeCrow;
use Illuminate\Http\Request;
//use App\Libraries\SafeCrow;

class TestPayController extends Controller
{
    public function index(){
//        print_r(json_decode(SafeCrow::createUser('79213877640', 'v.a.volkov@icloud.com', 'Victor', 'Volkov')));
        print_r(json_decode(SafeCrow::getUsers()));
        //print_r(json_decode(SafeCrow::createDeal(2541, 2542, 11000, 'Просто3', 'supplier')));
        //print_r(json_decode(SafeCrow::addUserCard(2542, 'http://vsealaddin.ru')));
//        print_r(json_decode(SafeCrow::showUserCards(2554)));
        //print_r(json_decode(SafeCrow::getOrder()));
        //print_r(json_decode(SafeCrow::preAuth(8306, 'http://vsealaddin.ru')));
        //print_r(json_decode(SafeCrow::confirmPreAuth(8305)));
        //print_r(json_decode(SafeCrow::releasePreAuth(8305)));  //Ошибка "missing keyword terminal"
        //SafeCrow::annulOrder(8281, 'cause');
        //print_r(json_decode(SafeCrow::cardPaySupplier(1554, 2542, 8305))); //Ошибка {"errors":[{"invalid_status":"Cannot assign card with status paid."}]}
        //print_r(json_decode(SafeCrow::escalateOrder(8280, 'Test')));
        //print_r(json_decode(SafeCrow::payOrder(8306, 'http://vsealaddin.ru')));
        //print_r(json_decode(SafeCrow::closeOrder(8305)));
    }
}
