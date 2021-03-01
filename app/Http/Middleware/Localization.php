<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Filesystem\Filesystem;

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
            $locales = array_map('basename', app()->make(Filesystem::class)->directories(resource_path('lang')));
            $locale = $request->session()->get('locale', $request->getPreferredLanguage($locales));
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
