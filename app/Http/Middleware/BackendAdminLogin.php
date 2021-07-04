<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BackendAdminLogin
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
        if($this->checkAdminLogin($request)){
            return $next($request);
        }
        return redirect()->route('admin.login');
    }

    /**
     * Handle an checkAdminLogin.
     *
     * @param $request
     * @return boolean
     */
    private function checkAdminLogin($request)
    {
        $useSession = $request->session()->get('adminUsername');
        if(!empty($useSession)) {
            return true;
        }
        return false;
    }
}
