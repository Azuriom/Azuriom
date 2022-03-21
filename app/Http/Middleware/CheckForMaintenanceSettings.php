<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

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
    public function handle(Request $request, Closure $next)
    {
        if (! setting('maintenance.enabled', false)) {
            return $next($request);
        }

        if ($request->routeIs($this->exceptRoutes) || $request->is($this->except)) {
            return $next($request);
        }

        if ($request->user() !== null && $request->user()->can('maintenance.access')) {
            return $next($request);
        }

        $blockedPaths = array_map(function (string $path) {
            return Str::endsWith($path, '/*')
                ? Str::replaceLast('/*', '*', $path)
                : $path;
        }, setting('maintenance.paths', []));

        if (! empty($blockedPaths) && ! $request->is($blockedPaths)) {
            return $next($request);
        }

        return $this->renderMaintenanceView();
    }

    protected function renderMaintenanceView()
    {
        $maintenanceMessage = setting('maintenance.message', trans('messages.maintenance.message'));

        return response()->view('maintenance', [
            'maintenanceMessage' => new HtmlString($maintenanceMessage),
        ], 503);
    }
}
