<?php

namespace App\Http\Controllers;

use App\Libraries\SafeCrow\SafeCrow;
use Illuminate\Http\Request;
//use App\Libraries\SafeCrow;

class TestPayController extends Controller
{
    public function index(){
        //SafeCrow::createUser('79006549567', 'example1@gg.ru', 'first1', 'last1');
        //SafeCrow::createDeal(2541, 2542, 11000, 'Просто', 'supplier');
        //SafeCrow::addUserCard(2542, 'http://vsealaddin.ru');
        //SafeCrow::showUserCards(2542);
        //SafeCrow::getOrder();
        //SafeCrow::preAuth(8281, 'http://vsealaddin.ru');
        //SafeCrow::confirmPreAuth(8281);
        //SafeCrow::releasePreAuth(8281);  //Ошибка "missing keyword terminal"
        //SafeCrow::annulOrder(8281, 'cause');
        //SafeCrow::cardPaySupplier(1554, 2542, 8280); //Ошибка {"errors":[{"invalid_status":"Cannot assign card with status paid."}]}
    }
}
