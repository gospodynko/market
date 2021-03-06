<?php

namespace App\Http\Middleware;

use Closure;

class AuthSite
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
        if (!$request->input('phone')) {
            return abort(500);
        }
        return $next($request);
    }
}
