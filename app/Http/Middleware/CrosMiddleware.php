<?php

namespace App\Http\Middleware;

use Closure;

class CrosMiddleware
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
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE,OPTIONS,PATCH');
        if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
            echo 'ok';die;
        }
        return $next($request);
    }
}
