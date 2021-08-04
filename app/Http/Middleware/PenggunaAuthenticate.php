<?php

namespace App\Http\Middleware;

use Closure;

class PenggunaAuthenticate
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
        if (!auth()->guard('siam')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect(route('siam.login'));
        }
        //JIKA SUDAH MAKA REQUEST YANG DIMINTA AKAN DISEDIAKAN
        return $next($request);
    }
}
