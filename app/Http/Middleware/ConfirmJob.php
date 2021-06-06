<?php

namespace App\Http\Middleware;

use Closure;
use App\Job;

class ConfirmJob
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
        if(Job::where('client_id',auth()->user()['id'])->where('id',$request->id)->first()){
            return $next($request);
        }
        else{
            abort(404);
        }
    }
}
