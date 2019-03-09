<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminLogin
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
        //判断用户是否登录
        if (!session('is_login')){
            return redirect()->to('admin/login')->withErrors(['登录已超时,请重新登录']);
        }

        return $next($request);
    }
}
