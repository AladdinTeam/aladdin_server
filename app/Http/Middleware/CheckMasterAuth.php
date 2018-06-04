<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;

class CheckMasterAuth
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
        if($request->session()->get("auth") != null){
            if($request->session()->get("id") != null){
                if(($request->session()->get("user_type") != null)){
                    if(Crypt::decryptString($request->session()->get("user_type")) == 1) {
                        return $next($request);
                    } else {
                        return redirect('/noaccess');
                    }
                } else {
                    //TODO: Очистить сессию
                    return redirect('/login')->with("unsuccess", "Требуется авторизация");
                }
            } else {
                //TODO: Очистить сессию
                return redirect('/login')->with("unsuccess", "Требуется авторизация");
            }
        } else {
            //TODO: Очистить сессию
            return redirect('/login')->with("unsuccess", "Требуется авторизация");
        }
    }
}
