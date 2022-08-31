<?php

namespace Azuriom\Http\Middleware;

use Azuriom\Http\Controllers\InstallController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;
use Symfony\Component\HttpFoundation\Response;

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
        config([
            'app.key' => InstallController::TEMP_KEY,
            'app.debug' => true,
            'app.env' => 'local',
        ]);

        App::setLocale($locale = $this->getRequestLocale($request));

        if (! is_writable(base_path())) {
            return new Response('Missing write permission on '.base_path());
        }

        if ($request->is('install/*', '_debugbar/*')) {
            return $this->addLocaleCookieToResponse($next($request), $locale);
        }

        return response()->view('install.index', [
            'requirements' => InstallController::getRequirements(),
            'compatible' => ! in_array(false, InstallController::getRequirements(), true),
            'phpVersion' => InstallController::parsePhpVersion(),
            'minPhpVersion' => InstallController::MIN_PHP_VERSION,
            'base' => base_path(),
        ]);
    }

    protected function getRequestLocale(Request $request)
    {
        $locales = InstallController::getAvailableLocaleCodes();
        $locale = $request->input('locale');

        if ($locales->contains($locale)) {
            return $locale;
        }

        if ($locales->contains($locale = $request->cookie('azuriom_locale'))) {
            return $locale;
        }

        return $request->getPreferredLanguage($locales->all());
    }

    protected function addLocaleCookieToResponse(Response $response, string $locale)
    {
        $response->headers->setCookie(cookie('azuriom_locale', $locale, 60 * 24));

        return $response;
    }
}
