<?php

namespace App\Http\Middleware;

use Closure;

class CheckMiddleware
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
        //在这里做鉴权
        $authFaild = false;
        if ($authFaild) {
            header('HTTP/1.1 403 Forbidden');
            echo 'no authentication';
            die;
        }
        return $next($request);
    }
}
