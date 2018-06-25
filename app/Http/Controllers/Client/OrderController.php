<?php

namespace App\Http\Controllers\Client;

use App\Additional_Service;
use App\Category;
use App\Client;
use App\Libraries\SafeCrow\SafeCrow;
use App\Master;
use App\Order;
use App\Subcategory;
use App\Subway;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware("client_auth");
        session()->forget('category');
        session()->forget('subcategory');
        session()->forget('subway');
        session()->forget('safety');
    }

    public function getModalOrder(Request $request){
        $order = Order::find($request->id);
        $categories = Category::get(['id', 'name']);
        $subcategories = $order->category->subcategories()->select('id', 'name')->get();
        $subways = Subway::get(['id', 'name']);

        return json_encode(
            [
                'categories' => $categories,
                'subcategories' => $subcategories,
                'subways' => $subways,
                'order' => $order
            ]
        );

        //print_r(json_decode($gg));
        //return json_decode()
    }

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
        $order = Order::find($request->order);
        $client = $order->client;
        $master = $order->masters()->where('master_id', $request->master)->first();
        if($order->safety == 0){
            $order->update(['status' => 1]);
            $order->update(['work_master_id' => $master->id]);
            return redirect('/orders');
        } else {
            if(($order->sc_id != null) and ($order->sc_id != 1)){
                $deal = json_decode(SafeCrow::getOrder($order->sc_id));
                if(isset($deal->error)){
                    $deal = json_decode(SafeCrow::createDeal(
                        $client->sc_id,
                        $master->sc_id,
                        $master->pivot->price * 100,
                        $order->header
                    ));
                } else {
                    if(($master->sc_id != $deal->supplier_id) or ($master->pivot->price * 100 != $deal->price) or
                        ($order->header != $deal->description)){
                        $deal = json_decode(SafeCrow::createDeal(
                            $client->sc_id,
                            $master->sc_id,
                            $master->pivot->price * 100,
                            $order->header
                        ));
                    }
                }
            } else {
                $deal = json_decode(SafeCrow::createDeal(
                    $client->sc_id,
                    $master->sc_id,
                    $master->pivot->price * 100,
                    $order->header
                ));
            }
            //print_r($deal);

            /*$deal = json_decode(SafeCrow::getOrder(null, $client->sc_id));
            foreach ($deal as $d){
                if(($master->sc_id == $d->supplier_id) and ($master->pivot->price * 100 == $d->price) and
                    ($order->header == $d->header))
            }*/
            //print_r($deal);
            /*$deal = json_decode(SafeCrow::createDeal(
                $client->sc_id,
                $master->sc_id,
                $master->pivot->price * 100,
                $order->header
            ));*/

            $order->update([
                'sc_id' => $deal->id,
                'work_master_id' => $master->id
            ]);

            $deal = json_decode(SafeCrow::preAuth(
                $order->sc_id,
                'http://aladdin.hoolee/after_pay'
            ));

            if(isset($deal->errors)){
                $deal = json_decode(SafeCrow::getOrder($order->sc_id));
                if($deal->status == 'preauthorized'){
                    $order->update(['status' => 5]);
                } elseif($deal->status == 'paid'){
                    $order->update(['status' => 1]);
                } elseif($deal->status == 'escalated'){
                    $order->update(['status' => -2]);
                } elseif($deal->status == 'pending'){
                    $order->update(['status' => 0]);
                } elseif($deal->status == 'closed'){
                    $order->update(['status' => 3]);
                }
                return redirect('/order/'.$order->id);
            }

            return redirect($deal->redirect_url);
        }
    }

    public function afterPay(Request $request){
        $order_id = explode('_', $request->orderId);
        $order = Order::where('sc_id', $order_id[0]);
        $order->update(['status' => 5]);
        //$order->update(['work_master_id' => Crypt::decryptString($request->session()->get('master'))]);
        //$order->update(['amount' => Crypt::decryptString($request->session()->get('price'))]);
       // $request->session()->forget('master');

        return redirect('/order/'.$order->id);

        //echo "И вот я здесь";
    }

    public function payOrder(Request $request){
        //echo $request->order;
        $order = Order::find($request->order);

        $deal = json_decode(SafeCrow::confirmPreAuth($order->sc_id));

        $order->update(['status' => 11]);

        return redirect('/order/'.$order->id);
        //print_r($deal);
    }

    public function cancelOrder(Request $request){
        $order = Order::find($request->order);

        $deal = json_decode(SafeCrow::releasePreAuth($order->sc_id));

        $deal = json_decode(SafeCrow::annulOrder($order->sc_id, $request->reason));

        $order->update([
            //'sc_id' => null,
            'sc_id' => 1,
            'status' => 0,
            'work_master_id' => null
        ]);

        return redirect('/orders');

        //print_r($deal);
    }

    public function closeOrder(Request $request){
        $order = Order::find($request->order);
        $master = $order->choosen_master;

        foreach ($order->additional_services as $service){
            $deal = json_decode(SafeCrow::cardPaySupplier($master->master_info->card_id, $master->sc_id, $service->sc_id));

            if($deal->supplier_payout_method_type == 'CreditCard'){
                SafeCrow::closeOrder($order->sc_id);
            }
        }

        $deal = json_decode(SafeCrow::cardPaySupplier($master->master_info->card_id, $master->sc_id, $order->sc_id));

        if($deal->supplier_payout_method_type == 'CreditCard'){
            $deal = json_decode(SafeCrow::closeOrder($order->sc_id));

            if($deal->status == 'closed'){
                $order->update(['status' => 3]);
            }
        }

        return redirect('/order/'.$order->id);
    }

    public function escalateOrder(Request $request){
        $order = Order::find($request->order);

        foreach ($order->additional_services as $service){
            SafeCrow::escalateOrder($service->id, 'The customer is unhappy');
        }

        $deal = json_decode(SafeCrow::escalateOrder($order->id, 'The customer is unhappy'));

        if($deal->status == 'escalated'){
            $order->update(['status' => -2]);
        }
    }

    public function confirmAdditionalService(Request $request){
        $service = Additional_Service::find($request->service);

        $deal = json_decode(SafeCrow::createDeal(
            $service->order->client->sc_id,
            $service->order->choosen_master->sc_id,
            $service->price * 100,
            $service->name
        ));

        $service->update(['sc_id' => $deal->id]);

        $deal = json_decode(SafeCrow::payOrder($service->sc_id, 'http://aladdin.hoolee/order/'.$service->order->id));

        $service->update(['confirmed' => 1]);

        return redirect($deal->redirect_url);
    }

    public function cancelAdditionalService(Request $request){
        $service = Additional_Service::find($request->service);
        $order_id = $service->order->id;
        $service->delete();

        return redirect('/order/'.$order_id);
    }

    public function checkOrderStatus(Request $request){
        $order = Order::find($request->order);
        if($order->status != $request->status){
            return json_encode(['check' => true]);
        } else {
            return json_encode(['check' => false]);
        }
    }

    public function callback(Request $request){
        $f = fopen('example.txt', 'w');
        $test = fwrite($f, serialize($_GET));
        if(isset($request->card_id)){
            $user = Master::where('sc_id', $request->user_id)->first();
            $info = $user->master_info;
            $info->update(['card_id' => $request->card_id]);
        } else {
            $sc_id = explode('_', $request->orderId);
            $order = Order::where('sc_id', $sc_id[0])->first();
            if ($order != null) {
                $deal = json_decode(SafeCrow::getOrder($sc_id[0]));
                //$test = fwrite($f, $deal->status . " ");
                switch ($deal->status) {
                    case 'preauthorized':
                        {
                            $order->update(['status' => 5]);
                            //$test = fwrite($f, $deal->status . " ");
                            break;
                        }
                    case 'pending':
                        {
                            SafeCrow::annulOrder($sc_id[0], 'The choice was not confirmed');
                            $order->update([
                                'status' => 0,
                                'work_master_id' => null,
                                'sc_id' => 1
                            ]);
                            //$test = fwrite($f, $deal->status . " ");
                            break;
                        }
                    case 'paid':
                        {
                            //$test = fwrite($f, $deal->status . " ");
                            $order->update(['status' => 1]);
                            break;
                        }
                    case 'closed':
                        {
                            //$test = fwrite($f, $deal->status . " ");
                            $order->update(['status' => 3]);
                            break;
                        }
                    case 'escalated':
                        {
                            //$test = fwrite($f, $deal->status . " ");
                            $order->update(['status' => -2]);
                            break;
                        }
                }
            } else {
                $service = Additional_Service::where('sc_id', $sc_id[0])->first();
                $deal = json_decode(SafeCrow::getOrder($sc_id[0]));
                switch ($deal->status) {
                    case 'paid':
                        {
                            //$test = fwrite($f, $deal->status . " ");
                            $service->update(['verificated' => 1]);
                            break;
                        }
                }

            }
        }
    }
}
