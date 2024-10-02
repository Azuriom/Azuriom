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
            if($request->user()->locale) {// check if locale have been set
                app()->setLocale($request->user()->locale); // set locale is found
                return $next($request);
            }
        }
        return $next($request);
    }
}