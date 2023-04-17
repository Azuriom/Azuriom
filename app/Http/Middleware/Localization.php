<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Localization
{
    /**
     * Handle an incoming request to set the locale.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $langDirs = array_map('basename', File::directories(base_path('resources/lang')));
        if (! $request->session()->has('locale')) {
            $request->session()->put('locale', $request->getPreferredLanguage($langDirs));
        }

        app()->setLocale($request->session()->get('locale'));

        return $next($request);
    }
}
