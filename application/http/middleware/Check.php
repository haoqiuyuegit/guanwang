<?php

namespace app\http\middleware;

class Check
{
    public function handle($request, \Closure $next)
    {
        if ($request->url() != '/admin/login') {

            if (!session('uid')) {
                return redirect('/admin/login');
            } else {
                if (session('timer') + 7200 < time()) {
                    session(null);
                    return redirect('/admin/login');
                }else{
                    session('timer',time());
                }
            }
        };
        return $next($request);

    }
}
