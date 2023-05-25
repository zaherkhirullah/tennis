<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;

class Language
{
    public function handle($request, Closure $next)
    {
        App::setLocale(lang());
        return $next($request);
    }
}
