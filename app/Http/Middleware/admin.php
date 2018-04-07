<?php

namespace App\Http\Middleware;

use Closure;
use Auth ;
use Session;
class Admin
{
    public function handle($request, Closure $next)
    {
        if (Auth::User())
        {
            if(Auth::User()->id==1)
             return $next($request);
         }
         Session::flash('error', "You are don't authorize for access to this page  ");         
         return redirect()->route('home');
    }
}
