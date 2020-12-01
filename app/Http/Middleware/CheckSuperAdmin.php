<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckSuperAdmin
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
        if (Auth::user()->role != 'super_admin') {
            return redirect(route('unauthorized'));
        }
        return $next($request);
    }
}
