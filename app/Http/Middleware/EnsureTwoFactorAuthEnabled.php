<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureTwoFactorAuthEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (setting('admin.force_2fa', false) && ! $user->hasTwoFactorAuth()) {
            return response()->view('admin.errors.2fa', [], 403);
        }

        return $next($request);
    }
}
