<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Master;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;

class LandingController extends Controller
{
    public function index() {
        if(session()->has("auth")){
            if(Crypt::decryptString(session()->get('user_type')) == 0){
                $user = Client::find(Crypt::decryptString(session()->get('id')));
            } else {
                $user = Master::find(Crypt::decryptString(session()->get('id')));
            }
            if($user == null){
                session()->forget('auth');
                session()->forget('user_type');
                session()->forget('id');
            } else {
                if ($user->last_name != null) {
                    $name = $user->last_name;
                } else {
                    $name = 'Пользователь';
                }
            }
        }
        $categories = Category::get();
        if(isset($name)) {
            return view("landing", ["categories" => $categories, 'name' => $name]);
        } else {
            return view("landing", ["categories" => $categories]);
        }
    }
}
