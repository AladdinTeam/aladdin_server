<?php

namespace App\Http\Controllers\Client;

use App\Additional_Service;
use App\Libraries\SafeCrow\SafeCrow;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function showPage(){
        $working_orders = Order::where('client_id', Crypt::decryptString(session('id')))->
            where('status', '=', 1, 'and')->orderBy('name')->get();
        $pending_orders = Order::where('client_id', Crypt::decryptString(session('id')))->
            where('status', '=', 0, 'and')->orderBy('name')->get();
        $history_orders = Order::where('client_id', Crypt::decryptString(session('id')))->
            where('status', '=', 2, 'and')->orderBy('name')->get();
        $disput_orders = Order::where('client_id', Crypt::decryptString(session('id')))->
            where('status', '=', -1, 'and')->orderBy('name')->get();
    }

    public function showOrder($id){
        $order = Order::find($id);
    }

    /*public function createDealAndPreAuth(){
        $deal = SafeCrow::createDeal(
            $order->client_id,
            $order->master_id,
            ((double)$order->price)*100,
            $additionalService->name,
            'supplier'
        );

        SafeCrow::preAuth($deal['id'], 'http://vsealaddin.ru');
    }*/

    public function decisionAdditionalService($id, $status){
        $additionalService = Additional_Service::find($id);
        switch ($status){
            case 'Accept':
                $order = $additionalService->order;
                $deal = SafeCrow::createDeal(
                    $order->client_id,
                    $order->master_id,
                    ((double)$order->price)*100,
                    $additionalService->name,
                    'supplier'
                );

                SafeCrow::preAuth($deal['id'], 'http://vsealaddin.ru');
                $additionalService->update(['status' => 1]);
                //: Холдирование денег на карте
                break;
            case 'Denied':
                $additionalService->update(['status' => -1]);
                break;
        }
    }

    public function acceptMasterOffer(Request $request){
        $order = Order::find($request->order_id);
        if($order->safety == 0){
            $order->update(['status', 1]);
        } else {
            $deal = SafeCrow::createDeal(
                //$order->client->sc_id,
                //$order->master->sc_id,
                2541,
                2542,
                $order->masters()->where('master_id', $request->master_id)->first()->pivot->price,
                $order->header
            );

           print_r(json_decode($deal));
        }
    }
}
