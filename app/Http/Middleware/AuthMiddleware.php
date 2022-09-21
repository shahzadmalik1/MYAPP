<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{

    public function handle(Request $request, Closure $next)
    {
    
        if(Auth::check()){
            return $next($request);
            //redirect to any view not require auth
         }
         return redirect()->route('home');
    }
}
