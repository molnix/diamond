<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateWorker
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
        if(auth()->user()->access_id===2){
            return $next($request);
        }
        else{
            abort('404');
        }
    }
}
