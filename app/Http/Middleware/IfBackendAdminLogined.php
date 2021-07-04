<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IfBackendAdminLogined
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
        if(!empty($request->session()->get('adminUsername'))) {
            // da login roi : mac dinh luon luon vao dashboard
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
