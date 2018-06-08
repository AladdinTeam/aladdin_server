<?php
/**
 * Created by PhpStorm.
 * User: v.v.alexeevich.95
 * Date: 06/06/2018
 * Time: 20:04
 */

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Master;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(Request $request) {
        $user = Master::find($request->master_id);
        return response()->json(["type", $request->type_order]);
    }


    public function getOrderInfo(Request $request) {

    }

    public function makeOffer(Request $request) {

    }

    public function addOffer(Request $request) {

    }

    public function completeOrder(Request $request) {

    }
}