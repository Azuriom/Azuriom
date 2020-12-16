<?php

namespace Azuriom\Http\Middleware;

use Closure;

class Localization
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
        if (auth()->check()) {
            $user = auth()->user();
            app()->setLocale($user->locale);
        } else {
            if (session()->has('locale')) {
                app()->setLocale(session('locale'));
            }
        }

        return $next($request);
    }
}
