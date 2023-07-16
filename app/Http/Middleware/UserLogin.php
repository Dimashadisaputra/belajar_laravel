<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class UserLogin
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
        if(!Session::has('user')){
            return redirect(url('login'));
        }
        return $next($request);
    }
}
