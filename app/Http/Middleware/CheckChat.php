<?php

namespace App\Http\Middleware;

use Closure;
use App\Chat;

class CheckChat
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
        $chat = Chat::where('id',$request->id)->where('user_id',auth()->user()['id'])->first();
        if($chat || auth()->user()['access_id']==1){
            return $next($request);
        }
        abort(404);
    }
}
