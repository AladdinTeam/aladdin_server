<?php

namespace App\Http\Controllers;

use App\Client;
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
        $active_orders = $client->orders()->whereIn('status', [1, 2])->get();
        //$active_orders = $client->orders()->get();
        //print_r($new_orders);

        return view('orders', [
            'name' => $client->last_name,
            'new_orders' => $new_orders,
            'active_orders' => $active_orders
        ]);
    }

    public function oneOrder(Order $order){
        return view ('order', ['order' => $order]);
    }
}
