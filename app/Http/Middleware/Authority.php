<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authority
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()["authority"]==1 ){
            return $next($request);
        }if(Auth::check() && Auth::user()["authority"]==0){
        return redirect("/users");
    }
        return redirect("/");
    }
}
