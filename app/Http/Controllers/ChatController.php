<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function createChannel(Request $request){
        Channel::create([
            'master_id' => $request->master,
            'client_id' => Crypt::decryptString(session()->get("id")),
            'order_id' => $request->order,
            'channel' => 'channel_'.$request->order
        ]);
        return redirect('/chat');
    }

    public function showPage(){
        $channels = Channel::where('client_id', Crypt::decryptString(session('id')))->get();

        return view('chat', ["channels" => $channels]);
    }

    public function uploadFile(Request $request){
//        $validator = Validator::make($request->all(),
//            [
//                'file' => 'mimes:doc,docx,xls,xlsx,png,jpg,jpeg,bmp,ppt,pptx';
//            ],
//            [
//
//            ])
        $validator = Validator::make($request->all(),
            [
                'file' => 'mimes:doc,docx,xls,xlsx,png,jpg,jpeg,bmp,ppt,pptx'
            ],
            [
                'file.mimes' => 'Данный файл нельзя отправить'
            ]);
        $validator->validate();
        $file = $request->file;
        $filename = $file->store('public/'.$request->channel);
        echo Storage::url($filename);
    }
}
