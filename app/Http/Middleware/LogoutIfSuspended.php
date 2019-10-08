<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutIfSuspended
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
        if ($request->user() && ($request->user()->is_banned || $request->user()->is_deleted)) {
            Auth::logout();
        }

        return $next($request);
    }
}
