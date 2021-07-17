<?php

namespace Azuriom\Http\Middleware;

use Azuriom\Http\Controllers\InstallController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Event;

class EnsureInstalled
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
        if (! empty(config('app.key'))) {
            return $next($request); // Already installed
        }

        // Azuriom is not installed... yet !
        // Unregister view composers because database is not setup
        Event::forget('composing: *');

        // Set a temporary key during the installation
        config(['app.key' => InstallController::TEMP_KEY]);

        App::setLocale($this->getRequestLocale($request));

        if ($request->is('install/*', '_debugbar/*')) {
            return $next($request);
        }

        return response()->view('install.index', [
            'requirements' => InstallController::getRequirements(),
            'compatible' => ! in_array(false, InstallController::getRequirements(), true),
            'phpVersion' => InstallController::parsePhpVersion(),
            'minPhpVersion' => InstallController::MIN_PHP_VERSION,
        ]);
    }

    protected function getRequestLocale(Request $request)
    {
        $locale = $request->input('locale');

        if (in_array($locale, InstallController::SUPPORTED_LANGUAGES, true)) {
            Cookie::queue(cookie('azuriom_locale', $locale, 60));

            return $locale;
        }

        if (in_array($locale = $request->cookie('azuriom_locale'), InstallController::SUPPORTED_LANGUAGES, true)) {
            return $locale;
        }

        return $request->getPreferredLanguage(InstallController::SUPPORTED_LANGUAGES);
    }
}
