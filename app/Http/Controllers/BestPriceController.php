<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Subway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class BestPriceController extends Controller
{
    public function index(){
        $categories = Category::get();
        $subways = Subway::get();
        $full_order = false;
        if(session()->has('auth')){
            if(Crypt::decryptString(session()->get('user_type')) == 0){
                $user = Client::find(Crypt::decryptString(session()->get('id')));
                $full_order = $user->orders()->where('status', '>', -1)->count() == 0 ? false : true;

            }
        }
        if(session()->has("auth")){
            if(Crypt::decryptString(session()->get('user_type')) == 0){
                $user = Client::find(Crypt::decryptString(session()->get('id')));
            } else {
                $user = Master::find(Crypt::decryptString(session()->get('id')));
            }
            if($user->last_name != null){
                $name = $user->last_name;
            } else {
                $name = 'Пользователь';
            }
        }
        return view('bestPrice', [
            "categories" => $categories,
            "subways" => $subways,
            'full_order' => $full_order,
            'name' => $name
        ]);
    }
}
