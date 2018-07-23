<?php

namespace App\Http\Controllers;

use App\Master;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function getChannels(Request $request) {
        $master = Master::find($request->master_id);
        
    }
}
