<?php

namespace App\Http\Controllers;

use App\Libraries\SafeCrow\SafeCrow;
use Illuminate\Http\Request;
//use App\Libraries\SafeCrow;

class TestPayController extends Controller
{
    public function index(){
        //print_r(json_decode(SafeCrow::createUser('79006549567', 'example1@gg.ru', 'first1', 'last1')));
//        $gg = json_decode(SafeCrow::createUser('79006349567', 'exampelews7@gg.ru', 'first1', 'last1'));
//        if(isset($gg->errors)){
//            print_r($gg->errors[0]->email);
//        }
//        print_r($gg);
        //echo 'ggggg'.$gg->id;
//        print_r(json_decode(SafeCrow::createUser('79006549567', 'example10@gg.ru', 'first1', 'last1')));
        //print_r(json_decode(SafeCrow::createUser('79213877640', 'v.a.volkov@icloud.com', 'Victor', 'Volkov')));
//        print_r(json_decode(SafeCrow::createDeal(2541, 2542, 11000, 'Просто3'))->id);
        print_r(json_decode(SafeCrow::addUserCard(2542, 'http://vsealaddin.ru/api/order/add_card_id')));
//        print_r(json_decode(SafeCrow::addUserCard(2542, 'http://192.168.43.207/api/order/add_card_id')));
        //print_r(json_decode(SafeCrow::showUserCards(2554)));
        //print_r(json_decode(SafeCrow::getOrder()));
        //print_r(json_decode(SafeCrow::preAuth(8306, 'http://vsealaddin.ru')));
        //print_r(json_decode(SafeCrow::confirmPreAuth(8305)));
        //print_r(json_decode(SafeCrow::releasePreAuth(8305)));  //Ошибка "missing keyword terminal"
        //SafeCrow::annulOrder(8281, 'cause');
        //print_r(json_decode(SafeCrow::cardPaySupplier(1554, 2542, 8305))); //Ошибка {"errors":[{"invalid_status":"Cannot assign card with status paid."}]}
        //print_r(json_decode(SafeCrow::escalateOrder(8280, 'Test')));
        //print_r(json_decode(SafeCrow::payOrder(8306, 'http://vsealaddin.ru')));
        //print_r(json_decode(SafeCrow::closeOrder(8305)));
//        echo SafeCrow::getUserIdByPhone('79006549567');
//        print_r(count(json_decode(SafeCrow::getUsers())));
//        print_r(json_decode(SafeCrow::getUsers()));
    }
}
