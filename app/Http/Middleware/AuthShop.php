<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AuthShop
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
        if( Auth::user()->status==1 && Auth::user()->type==2){
            return $next($request);
         }else{
            session()->flush();
            return redirect()->back()->with('status','Deactive This User Account');
         }
        return $next($request);
    }
}
