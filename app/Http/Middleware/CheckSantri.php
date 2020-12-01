<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckSantri
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
        if (Auth::user()->role != 'santri') {
            return redirect(route('unauthorized'));
        }
        return $next($request);
    }
}
