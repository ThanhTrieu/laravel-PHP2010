<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginBackend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $params = null)
    {
        // $params : tham so cua middleware
        if($params === 'admin'){
            // chay vuot qua middle - xu ly tiep cac routing
            return $next($request);
        }
        return redirect(route('be.login'));
    }
}
