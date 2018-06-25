<?php

namespace App\Http\Controllers;

use App\Client;
use App\Libraries\SafeCrow\SafeCrow;
use App\Master;
use App\Master_Info;
use App\Order;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    public function index($id) {
        $master = Master::find($id);
        $master_info = Master_Info::where('master_id', $id)->first();
        $services = $master->services()->where('verified', 1)->get();
        $reports = $master->reports()->orderBy('created_at')->get();
        return view("profile", [
            "master" => $master,
            'master_info' => $master_info,
            "services" => $services,
            'reports' => $reports
        ]);

    }

    public function orders(){
        $client = Client::find(Crypt::decryptString(session()->get('id')));
        $new_orders = $client->orders()->whereIn('status', [-1, 0])->get();
        /*print_r($new_orders);
        $i = 0;*/
        /*foreach ($new_orders as $key=>$new_order){
            if(($new_order->sc_id != null) and ($new_order->sc_id != 1)){
                $sc_order = json_decode(SafeCrow::getOrder($new_order->sc_id));
                switch ($sc_order->status){
                    case 'preauthorized': {
                        $new_order->update(['status' => 5]);
                        //print_r($new_order);
                        //echo '     '.$key;
                        $new_orders->forget($key);
                        break;
                    }
                    case 'pending': {
                        //print_r($new_order);
                        SafeCrow::annulOrder($new_order->sc_id, 'The choice was not confirmed');
                        $new_order->update([
                            'status' => 0,
                            'work_master_id' => null,
                            'sc_id' => 1
                        ]);
                    }
                }
            }
        }*/
        $active_orders = $client->orders()->whereIn('status', [1, 2, 5, 11])->get();
//        if(($client->first_name == null) or ($client->last_name==null) or ($client->email == null)){
//            echo '[eq';
//        }


        if(($client->first_name == null) or ($client->last_name==null) or ($client->email == null)){
            return view('orders', [
                'add_info' => true,
                'name' => $client->last_name,
                /*'new_orders' => $new_orders,
                'active_orders' => $active_orders*/
            ]);
        } else {
            return view('orders', [
                'name' => $client->last_name,
                'new_orders' => $new_orders,
                'active_orders' => $active_orders
            ]);
        }
    }

    public function oneOrder(Order $order){
        if($order->client->id == Crypt::decryptString(session()->get('id'))){
            return view ('order', ['order' => $order]);
        } else {
            return redirect('/orders');
        }
       /*if($order->additional_services == null){
           echo 'gg';
       } else {
           echo 'gj';
       }*/
        //return view ('order', ['order' => $order]);
    }
}
