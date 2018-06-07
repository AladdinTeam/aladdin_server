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
use App\Master;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrders(Request $request) {
        $master = Master::find($request->master_id);
        $orders = [];
        switch ($request->type_order) {
            case 0: {
                $personal_orders = $this::getPrivateOrders($master->id);
                $pull_orders = $this::getOrdersFromPull($master->subcategories()->pluck('subcategory_id'));
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

    private function getHistoryOrders($id) {
        $history_orders = Order::where('master_id', $id)->where('status', 2)->get();
        return $this->constructOrders($history_orders);
    }

    private function getActiveOrders($id, $isHolded) {
        $orders = Order::where('master_id', $id)->where('safety', $isHolded)->get();
        return $this->constructOrders($orders);
    }

    private function getWaitingOrders($id) {
        $orders = Order::where('master_id', $id)->where('status', 1)->get();
        return $this->constructOrders($orders);
    }

    private function getPrivateOrders($id) {
        $orders = Order::where('master_id', $id)->where('status', 0)->get();
        return $this->constructOrders($orders);
    }

    private function getOrdersFromPull($subcategories) {
        $orders = Order::where('status', 0)->whereIn('subcategory_id', $subcategories)->get();
        return $this->constructOrders($orders);
    }

    private function constructOrders($orders) {
        $res_orders = [];
        for ($i = 0; $i < count($orders); $i++) {
            $order = [
                "id" => $orders[$i]->id,
                "name" => $orders[$i]->header,
                "amount" => $orders[$i]->amount,
                "date" => "Hui znaet"
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
                "price" => $order->price,
                "date" => "Hui znaet",
                "description" => $order->description,
                "subway" => $order->subway
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
        //$order->masters()->sync($master->id);
        $order->masters()->attach($master->id, [
            "commentary" => $request->commentary,
            "price" => $request->price,
            "date" => $request->date
        ]);

        return response()->json(
            ErrorCode::sendStatus(ErrorCode::CODE_1)
        );
    }

    public function addService(Request $request) {
        Additional_Service::create([
            "order_id"=>$request->order_id,
            "name" => $request->service_name,
            "price" => $request->price,
            "units" => $request->units
        ]);
        return response()->json(
            ErrorCode::sendStatus(ErrorCode::CODE_1)
        );
    }

    public function completeOrder(Request $request) {
        $order = Order::find($request->order_id);
        if ($order->status == 2) {
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
}