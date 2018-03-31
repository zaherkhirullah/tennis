<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App;
class Language
{
    public function handle($request, Closure $next)
    {
       App::setLocale(lang());
       return $next($request);  
    }
}
