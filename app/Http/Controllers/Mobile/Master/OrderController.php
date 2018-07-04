<?php
/**
 * Created by PhpStorm.
 * User: v.v.alexeevich.95
 * Date: 06/06/2018
 * Time: 20:04
 */

namespace App\Http\Controllers\Mobile\Master;

use App\Additional_Service;
use App\AddLibraries\ErrorCode;
use App\Http\Controllers\Controller;
use App\Libraries\SafeCrow\SafeCrow;
use App\Master;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(Request $request) {
        $master = Master::find($request->master_id);
        $orders = [];
        switch ($request->order_type) {
            case 0: {
                $personal_orders = $this::getPrivateOrders($master->id);
                $pull_orders = $this::getOrdersFromPull($master->id, $master->master_info()->first()->card_id, $master->subcategories()->pluck('subcategory_id'));
                $orders = [$personal_orders, $pull_orders];
                break;
            }
            case 1: {
                $holded_orders = $this::getActiveOrders($master->id, 1);
                $cash_orders = $this::getActiveOrders($master->id, 0);
                $waiting_orders = $this->getWaitingOrders($master->id);
                $orders = [$holded_orders, $cash_orders, $waiting_orders];
                break;
            }
            case 2: {
                $history_orders = $this->getHistoryOrders($master->id);
                $orders = [$history_orders];
                break;
            }
        }
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["orders" => $orders]
            )
        );
    }

    private function getPrivateOrders($id) {
        $orders = Order::where('master_id', $id)->where('status', 0)->get();
        return $this->constructOrders($orders);
    }

    private function getOrdersFromPull($id, $cardId, $subcategories) {
        $orders = Order::where('master_id', '!=', $id)->orWhereNull('master_id')->where('status', 0)->whereIn('subcategory_id', $subcategories)->get();
        $sortedOrders = [];
        foreach($orders as $key=>$order) {
            $shit = $order->masters()->where('master_id', $id)->first();
            if ($shit == null) {
                if (!($cardId == null && $order->safety)) {
                    $sortedOrders[] = $order;
                }
            }
        }
        return $this->constructOrders($sortedOrders);
    }

    private function getHistoryOrders($id) {
        $history_orders = Order::where('work_master_id', $id)->where('status', 3)->get();
        return $this->constructOrders($history_orders);
    }

    private function getActiveOrders($id, $isHolded) {
        $orders = Order::where('work_master_id', $id)->where('safety', $isHolded)->where('status', 1)->get();
        return $this->constructOrders($orders);
    }

    private function getWaitingOrders($id) {
        $master = Master::find($id);
        $orders = $master->orders;
        $sortedOrders = [];
        foreach($orders as $key=>$order) {
            if($order->status == 0 || $order->status == 5) {
                $sortedOrders[] = $order;
            }
        }
        return $this->constructOrders($sortedOrders);
    }

//    private function getPrivateOrders($id) {
//        $orders = Order::where('work_master_id', '<>', $id)->orWhereNull('work_master_id')->where('master_id', $id)->where('status', 0)->get();
//        return $this->constructOrders($orders);
//    }
//
//    private function getOrdersFromPull($id, $subcategories) {
//        $orders = Order::where('master_id', '<>', $id)->whereNull('work_master_id')->where('status', 0)->whereIn('subcategory_id', $subcategories)->get();
//        foreach($orders as $key=>$order){
//            if($order->masters()->where('master_id', $id)->first() != null){
//                $orders->forget($key);
//            }
//        }
//        return $this->constructOrders($orders);
//    }

    private function constructOrders($orders) {
        $res_orders = [];
        for ($i = 0; $i < count($orders); $i++) {
            $order = [
                "id" => $orders[$i]->id,
                "name" => $orders[$i]->header,
                "amount" => $orders[$i]->amount,
                "safety" => $orders[$i]->safety,
                "date" => $orders[$i]->end_date
            ];
            $res_orders[] = $order;
        }
        return $res_orders;
    }

    public function getOrderInfo(Request $request) {
        $order = Order::find($request->order_id);
        if ($order != null) {
            $concreteOrder = [
                "id" => $order->id,
                "name" => $order->header,
                "amount" => $order->amount,
                "date" => $order->end_date,
                "description" => $order->description,
                "subway" => $order->subway,
                "additional_services" => $order->additional_services
            ];
            return response()->json(
                array_merge(
                    ErrorCode::sendStatus(ErrorCode::CODE_1),
                    ["order" => $concreteOrder]
                )
            );
        }
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_17),
                ["order_id" => $request->order_id]
            )
        );
    }

    public function makeOffer(Request $request) {
        $master = Master::find($request->master_id);
        $order = Order::find($request->id);
        $order->masters()->attach($master->id, [
            "commentary" => $request->commentary,
            "price" => $request->price,
            "date" => date("Y-m-d H:i:s", strtotime($request->date))
        ]);

        return response()->json(
            ErrorCode::sendStatus(ErrorCode::CODE_1)
        );
    }

    public function addService(Request $request) {
        Additional_Service::create([
            "order_id" => $request->order_id,
            "sc_id" => 0,
            "name" => $request->name,
            "price" => $request->price,
        ]);
        return response()->json(
            ErrorCode::sendStatus(ErrorCode::CODE_1)
        );
    }

    public function completeOrder(Request $request) {
        $order = Order::find($request->order_id);
        if ($order->status == 1) {
            $order->increment('status');
            return response()->json(
                ErrorCode::sendStatus(ErrorCode::CODE_1)
            );
        } else {
            return response()->json(
                ErrorCode::sendStatus(ErrorCode::CODE_18)
            );
        }
    }

    public function addBankCard(Request $request) {
        $master = Master::find($request->master_id);
        $safeCrowResult = json_decode(SafeCrow::addUserCard($master->sc_id, 'http://vsealaddin.ru/api/order/add_card_id'));
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["sc_link" => $safeCrowResult->redirect_url]
            )
        );
    }

    public function addCardID(Request $request) {
        print_r($request);
    }

    public function getBankCards(Request $request) {
        $master = Master::find($request->master_id);
        $safeCrowResult = json_decode(SafeCrow::showUserCards($master->sc_id));
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["cards" => $safeCrowResult]
            )
        );
    }

    public function getMaster(Request $request) {
        $master = Master::find($request->id);
        $masterArray = $master->toArray();
        $subcategories = $master->subcategories()->select('name', 'image_url')->get()->toArray();
        $masterSubways = $master->subways()->get();
        $masterServices = $master->services()->get();
        $masterInfo = $master->master_info()->first()->toArray();

        $masterArray = array_merge(
            $masterArray,
            ["subcategories" => $subcategories],
            ["subways" => $masterSubways],
            ["services" => $masterServices],
            ["master_info" => $masterInfo]);

        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["master" => $masterArray]
            )
        );
    }
}