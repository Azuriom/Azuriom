<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Response;

class SocialiteLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (oauth_login()) {
            $driver = game()->getSocialiteDriverName();

            return Socialite::driver($driver)->redirect();
        }

        return $next($request);
    }
}
