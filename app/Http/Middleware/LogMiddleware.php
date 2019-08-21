<?php

namespace App\Http\Middleware;

use Closure;

class LogMiddleware
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
        list($msec, $sec) = explode(' ', microtime());
        $seq = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
        config(['sequence' => $seq]);
        return $next($request);
    }
}
