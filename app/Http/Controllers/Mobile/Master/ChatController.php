<?php

namespace App\Http\Controllers\Mobile\Master;

use App\Client;
use App\Http\Controllers\Controller;
use App\AddLibraries\ErrorCode;
use App\Master;
use App\Order;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChannels(Request $request) {
        $master = Master::find($request->master_id);
        $channels = $master->channels()->get();
        $retChannels = [];
        foreach ($channels as $key=>$channel) {
            $order = Order::find($channel->order_id);
            $orderTheme = "";
            $clientName = "";
            if ($order != null) {
                $orderTheme = $order->header;
            }
            $client = Client::find($channel->client_id);
            if ($client != null) {
                $clientName = $client->first_name . " " . $client->last_name;
            }
            $retChannels[] = [
                "order_theme" => $orderTheme,
                "partner_name" => $clientName,
                "client_id" => $channel->client_id,
                "channel_id" => $channel->channel,
                "status" => 0
            ];
        }
        return response()->json(
            array_merge(
                ErrorCode::sendStatus(ErrorCode::CODE_1),
                ["channels" => $retChannels]
            )
        );
    }
}
