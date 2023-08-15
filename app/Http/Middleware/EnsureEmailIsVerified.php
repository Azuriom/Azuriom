<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified as Middleware;
use Symfony\Component\HttpFoundation\Response;

class EnsureEmailIsVerified extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $redirectToRoute
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirectToRoute = null): Response
    {
        if (! setting('mail.users_email_verification') && $request->user() !== null) {
            return $next($request);
        }

        return parent::handle($request, $next, $redirectToRoute);
    }
}
