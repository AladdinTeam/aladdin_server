<?php

namespace App\Http\Controllers\Mobile\Master;

use App\Client;
use App\Http\Controllers\Controller;
use App\AddLibraries\ErrorCode;
use App\Master;
use App\Order;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $avatarUrl = "";
            if ($order != null) {
                $orderTheme = $order->header;
            }
            $client = Client::find($channel->client_id);
            if ($client != null) {
                $clientName = $client->first_name . " " . $client->last_name;
                $avatarUrl = asset(Storage::url($master->photos()->where('is_avatar', 1)->first()->name));
            }
            $retChannels[] = [
                "order_theme" => $orderTheme,
                "partner_name" => $clientName,
                "client_id" => $channel->client_id,
                "channel_id" => $channel->channel,
                "avatar_url" => $avatarUrl,
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
