<?php

namespace Azuriom\Http\Middleware;

use Closure;

class CheckForMaintenanceSettings
{
    /**
     * The routes that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        'maintenance',
        'login',
        'logout',
        'admin.*',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (setting('maintenance-status', false)) {
            if ($request->routeIs($this->except) || $request->route()->uri() === 'user/login') {
                return $next($request);
            }

            if ($request->user() !== null && $request->user()->can('maintenance.access')) {
                return $next($request);
            }

            return redirect()->route('maintenance');
        }

        return $next($request);
    }
}
