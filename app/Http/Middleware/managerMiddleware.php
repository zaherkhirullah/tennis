<?php

namespace App\Http\Middleware;

use Closure;

class ManagerMiddleware
{

    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
