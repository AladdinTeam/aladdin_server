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

    public function deleteOrder(Request $request){
        Order::destroy($request->order_id);
    }

    public function acceptMasterOffer(Request $request){
        $order = Order::find($request->order_id);
        $client = $order->client;
        //$master = $order->master;
        $master = $order->masters()->where('master_id', $request->master_id)->first();
        if($order->safety == 0){
            $order->update(['status', 1]);
        } else {
            $deal = json_decode(SafeCrow::createDeal(
                $client->sc_id,
                $master->sc_id,
                $master->pivot->price,
                $order->header
            ));

            $order->update(['sc_id' => $deal->id]);

            $deal = json_decode(SafeCrow::cardPaySupplier(
                $master->master_info->card_id,
                $master->sc_id,
                $deal->id
            ));

            $deal = json_decode(SafeCrow::preAuth(
                $deal->id,
                'http://aladdin.hoolee/after_pay'
            ));

           //print_r($deal);
        }
    }

    public function afterPay(Request $request){
        if($request->status == 'success'){
            echo 'Hold complete';
        }

        $order_id = explode('_', $request->orderId);
        $order = Order::where('sc_id', $order_id[0]);
        $order->update(['status' => 1]);
    }

    public function acceptMasterOfferForPay(Request $request){
        $order = Order::find($request->order_id);

        $deal = json_decode(SafeCrow::confirmPreAuth($order->sc_id));

        //print_r($deal);
    }

    public function declineMasterOfferForPay(Request $request){
        $order = Order::find($request->order_id);

        $deal = json_decode(SafeCrow::releasePreAuth($order->sc_id));

        $deal = SafeCrow::annulOrder($order->sc_id, $request->reason);

        //print_r($deal);
    }
}
