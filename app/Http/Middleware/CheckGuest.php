<?php

namespace App\Http\Middleware;

use Closure;

class CheckGuest
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
        if($request->session()->get("auth") == null){
            $request->session()->forget('id');
            $request->session()->forget('user_type');
            return $next($request);
        } else {
            return back()->with("NotClient", "Требуется вый");
        }
    }
}
