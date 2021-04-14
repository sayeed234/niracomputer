<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AuthAdmin
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
         if(Auth::user()->type==1 && Auth::user()->status==1){
            return $next($request);
         }else{
            session()->flush();
            return redirect()->back()->with('status','Deactive This Admin Account');
         }
        return $next($request); 
    }
}
