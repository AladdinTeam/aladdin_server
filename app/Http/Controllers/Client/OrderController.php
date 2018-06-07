<?php

namespace App\Http\Controllers\Client;

use App\Additional_Service;
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

    public function decisionAdditionalService($id, $status){
        $additionalService = Additional_Service::find($id);
        switch ($status){
            case 'Accept':
                $additionalService->update(['status' => 0]);
                break;
            case 'Denied':
                $additionalService->update(['status' => 1]);
                break;
        }
    }

}
