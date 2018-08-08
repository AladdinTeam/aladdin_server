<?php

namespace App\Http\Middleware;

use App\AddLibraries\SmsWrapper;
use App\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;

class CheckClientAuth
{

    /*private function code_generation($count = 6){
        $code = "";
        for($i = 0; $i < $count; $i++) {
            $digit = random_int(0, 9);
            $code .= $digit;
        }
        return $code;
    }*/

    /*public function sendSms($phone){
        $phone = str_replace(['+', '(', ')', '-', ' '], [], $phone);
        $user = Client::firstOrCreate(['phone' => $phone]);
        $code = $this->code_generation();
        $user->update(['confirm_code' => $code]);
        SmsWrapper::SenderSMS($phone, "You code for Aladdin auth is: ".$code, "Aladdin");
        session(['id' => Crypt::encryptString($user->id)]);
        session(['user_type' => Crypt::encryptString(0)]);
    }*/
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //print_r($_POST);
        /*if(isset($_POST)){
            session(["target" => $request->path()]);
            session(["POST" => serialize($_POST)]);
        }*/
        if($request->session()->get("auth") != null){
            if($request->session()->get("id") != null){
                if(($request->session()->get("user_type") != null)){
                    if(Crypt::decryptString($request->session()->get("user_type")) == 0) {
                        return $next($request);
                    } else {
                        return redirect('/noaccess');
                    }
                } else {
                    /*if($request->session()->has("phone")){
                        $this->sendSms($request->session()->get('phone'));
                        $request->session()->forget("phone");
                        return redirect('/confirm');
                    }*/
                    $request->session()->forget('id');
                    $request->session()->forget('auth');
                    $request->session()->forget('user_type');
                    return redirect('/login')->with("unsuccess", "Требуется авторизация");
                }
            } else {
                /*if($request->session()->has("phone")){
                    $this->sendSms($request->session()->get('phone'));
                    $request->session()->forget("phone");
                    return redirect('/confirm');
                }*/
                $request->session()->forget('id');
                $request->session()->forget('auth');
                $request->session()->forget('user_type');
                return redirect('/login')->with("unsuccess", "Требуется авторизация");
            }
        } else {
            /*if($request->session()->has("phone")){
                $this->sendSms($request->session()->get('phone'));
                $request->session()->forget("phone");
                return redirect('/confirm');
            }*/
            $request->session()->forget('id');
            $request->session()->forget('auth');
            $request->session()->forget('user_type');
            return redirect('/login')->with("unsuccess", "Требуется авторизация");
        }
    }
}
