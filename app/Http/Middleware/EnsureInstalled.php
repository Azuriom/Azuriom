<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
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
    public function handle($request, Closure $next)
    {
        if (config('app.key') === null) {
            // Azuriom is not installed... yet !
            Event::forget('composing: *');

            return response()->view('errors.install');
        }

        return $next($request);
    }
}
