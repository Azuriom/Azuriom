<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class Localization
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next): Response
    {
        if ($request->user()) { // if logged
            if($locale = $request->user()->locale) {// check if locale have been set
                app()->setLocale($locale); // set locale is found
                return $next($request);
            }
        }
        /*$locales = get_selected_locales_codes();
        $locale = $request->session()->get('locale', $request->getPreferredLanguage($locales));
        app()->setLocale($locale);*/
        return $next($request);
    }
}