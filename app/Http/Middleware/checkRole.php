<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class checkRole
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
        if(Auth::check()) {
            // echo Auth::user()->role;
            if(Auth::user()->role == "admin"){
                // echo Route::currentRouteAction() ;
                return redirect('dashboard')->with( $request->all());
            }
        }
        // var_dump($request);
        return $next($request);
    }
}
