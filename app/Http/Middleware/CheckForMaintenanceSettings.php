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
    protected $exceptRoutes = [
        'maintenance',
        'login',
        'login.*',
        'password.*',
        'logout',
        'admin.*',
    ];

    /**
     * The paths that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        'user/login',
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
        if (! setting('maintenance-status', false)) {
            return $next($request);
        }

        if ($request->routeIs($this->exceptRoutes) || $request->is($this->except)) {
            return $next($request);
        }

        if ($request->user() !== null && $request->user()->can('maintenance.access')) {
            return $next($request);
        }

        return redirect()->route('maintenance');
    }
}
