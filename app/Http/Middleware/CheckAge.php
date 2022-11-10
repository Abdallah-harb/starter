<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAge
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
        //logic middleware
            //to get user info
           $age = Auth::user()->age;
            if ($age < 18){
                return redirect()->route('home');
            }
        return $next($request);
    }
}
