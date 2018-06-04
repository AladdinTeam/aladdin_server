<?php

namespace App\Http\Middleware;

use App\AddLibraries\ErrorCode;
use App\Master;
use Closure;

class CheckAuthMasterApi
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
        $user = Master::where("token", $request->token)->first();
        if($user != null){
            if (($user->token == $request->token) and ($user->token_until > date("Y-m-d H:i:s"))) {
                $request->master_id = $user->id;
                return $next($request);
            } else {
                return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_6));
            }
        } else {
            return response()->json(ErrorCode::sendStatus(ErrorCode::CODE_5));
        }
    }
}
