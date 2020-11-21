<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (oauth_login()) {
            $driver = game()->getSocialiteDriverName();

            return Socialite::driver($driver)->redirect();
        }

        return $next($request);
    }
}
