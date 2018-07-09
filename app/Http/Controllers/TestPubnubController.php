<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PubNub\Callbacks\SubscribeCallback;
use PubNub\Enums\PNStatusCategory;
use PubNub\PNConfiguration;
use PubNub\PubNub;

class MySubscribeCallback extends SubscribeCallback {
    function status($pubnub, $status) {
        if ($status->getCategory() === PNStatusCategory::PNConnectedCategory) {
            // Publish in another thread
            $pubnub->publish()
                ->channel("Channel-1123")
                ->message([
                    "fieldA"=> "awesome",
                    "fieldB"=> 10
                ])
                ->sync();
        }
    }

    function message($pubnub, $message) {
        print_r( $message->getMessage());

    }

    function presence($pubnub, $presence) {
    }
}

class TestPubnubController extends Controller
{

    public function index(){


        $pnconf = new PNConfiguration();

        $pnconf->setSubscribeKey("sub-c-3b2fe186-836a-11e8-b9aa-969f058f0c4c");
        $pnconf->setPublishKey("pub-c-be21b986-aa4e-4906-ada6-c40f640e011c");
        $pnconf->setSecure(false);

        $pubnub = new PubNub($pnconf);

        $subscribeCallback = new MySubscribeCallback();

        $pubnub->addListener($subscribeCallback);

        $pubnub->subscribe()
            ->channels("Channel-1123")
            ->execute();
        echo "gg";

/*// Subscribe to a channel, this is not async.
        $pubnub->subscribe()
            ->channels("hello_world")
            ->execute();

// Use the publish command separately from the Subscribe code shown above.
// Subscribe is not async and will block the execution until complete.
        $result = $pubnub->publish()
            ->channel("hello_world")
            ->message("Hello PubNub")
            ->sync();

        print_r($result);*/
    }
}

