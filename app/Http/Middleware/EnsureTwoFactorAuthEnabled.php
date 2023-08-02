<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorAuthEnabled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (setting('admin.force_2fa', false) && ! $user->hasTwoFactorAuth()) {
            return response()->view('admin.errors.2fa', [], 403);
        }

        return $next($request);
    }
}
