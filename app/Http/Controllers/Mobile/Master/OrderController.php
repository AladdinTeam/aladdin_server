<?php
/**
 * Created by PhpStorm.
 * User: v.v.alexeevich.95
 * Date: 06/06/2018
 * Time: 20:04
 */

namespace App\Http\Controllers\Mobile\Master;

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
            case 0: { // Pull
                $personal_orders = $this::getPrivateOrders($master->id);
                $pull_orders = $this::getOrdersFromPull($master->subcategories()->pluck('subcategory_id'));
                $orders = [$personal_orders, $pull_orders];
            }
            case 1: { //Active
                $holded_orders = $this::getActiveOrders($master->id, 1);
                $cash_orders = $this::getActiveOrders($master->id, 0);
                $waiting_orders = $this->getWaitingOrders($master->id);
                $orders = [$holded_orders, $cash_orders, $waiting_orders];
            }
            case 2: { //History

            }
        }
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["orders" => $orders]
            )
        );
    }

    private function getActiveOrders($id, $isHolded) {
        $orders = Order::where('master_id', $id)->where('safety', $isHolded);
        return $this->constructOrders($orders);
    }

    private function getWaitingOrders($id) {
        $orders = Order::where('master_id', $id)->where('status', 1);
        return $this->constructOrders($orders);
    }

    private function getPrivateOrders($id) {
        $orders = Order::where('master_id', $id)->get();
        return $this->constructOrders($orders);
    }

    private function getOrdersFromPull($subcategories) {
        $orders = Order::whereIn('subcategory_id', $subcategories)->get();
        return $this->constructOrders($orders);
    }

    private function constructOrders($orders) {
        $res_orders = [];
        for ($i = 0; $i < count($orders); $i++) {
            $order = [
                "id" => $orders[$i]->id,
                "name" => $orders[$i]->header,
                "price" => $orders[$i]->price,
                "date" => "Hui znaet"
            ];
            $res_orders[] = $order;
        }
        return $res_orders;
    }

    public function getOrderInfo(Request $request) {
        $order = Order::find($request->id);
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
        return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_17));
    }

    public function makeOffer(Request $request) {
        $master = Master::find($request->master_id);
        $order = Order::find($request->id);

    }

    public function addService(Request $request) {
        $order = Order::find($request->order_id);
        $service = Object::create([
            "service_name" => $request->adding_service["service_name"],
            "price" => $request->adding_service["price"],
            "units" => $request->adding_service["units"],
            "is_confirmed" => 0
        ]);
        $order->additional_services()->add($service);
        return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_1));
    }

    public function completeOrder(Request $request) {

    }
}