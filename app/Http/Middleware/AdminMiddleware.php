<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::User()) {
            if (Auth::id() == 1) {
                return $next($request);
            }
        }
        Session::flash('error', "You are don't authorize for access to this page  ");
        return redirect()->route('home');
    }
}
