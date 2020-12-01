<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckFinanceAdmin
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
        if (Auth::user()->role != 'finance_admin') {
            return redirect(route('unauthorized'));
        }
        return $next($request);
    }
}
