<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Crypt;

class CheckClientAuth
{
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
                    $request->session()->forget('id');
                    $request->session()->forget('auth');
                    $request->session()->forget('user_type');
                    return redirect('/login')->with("unsuccess", "Требуется авторизация");
                }
            } else {
                $request->session()->forget('id');
                $request->session()->forget('auth');
                $request->session()->forget('user_type');
                return redirect('/login')->with("unsuccess", "Требуется авторизация");
            }
        } else {
            $request->session()->forget('id');
            $request->session()->forget('auth');
            $request->session()->forget('user_type');
            return redirect('/login')->with("unsuccess", "Требуется авторизация");
        }
    }
}
