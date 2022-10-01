<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentAccessMiddleware
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
        // if(!Auth::check()){
        //     return redirect()->route('login');
        // }

        // if(Auth::user()->role == "admin"){
        //     return redirect()->route('adminCharts');
        // }
        
        // if(Auth::user()->role == "student"){
        //     return $next($request);
        // }
        // return $next($request);
    
        if(Auth::check()){
            if(Auth::user()->user_level == 'student'){
                return $next($request);
            }else{
                return redirect('/admin_access');
            }
        }else{
            return redirect()->route('login');
        }
        
    }
}
