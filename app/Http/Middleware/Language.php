<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class Language
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
        $locales = array_map('basename', app()->make(Filesystem::class)->directories(resource_path('lang')));
        $locale = $request->session()->get('locale', $request->getPreferredLanguage($locales));

        app()->setLocale($locale);

        return $next($request);
    }
}
