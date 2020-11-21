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
        $user = $request->user();

        if ($user !== null && ($user->isBanned(true) || $user->is_deleted)) {
            Auth::logout();
        }

        return $next($request);
    }
}
