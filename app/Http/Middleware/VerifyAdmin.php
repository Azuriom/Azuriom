<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyAdmin
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
        if (Auth::guest() || ! Auth::user()->isAdmin()) {
            abort(403);
        }

        return $next($request);
    }
}
