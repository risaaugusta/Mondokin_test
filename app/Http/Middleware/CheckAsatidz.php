<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAsatidz
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
        if (Auth::user()->role != 'asatidz') {
            return redirect(route('unauthorized'));
        }
        return $next($request);
    }
}
