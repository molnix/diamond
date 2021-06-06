<?php

namespace App\Http\Middleware;

use App\Chat;
use Closure;

class TrackedChat
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
        if(Chat::find($request->id)){
            return $next($request);
        }
        return redirect()->back();
    }
}
