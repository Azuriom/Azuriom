<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class CheckForMaintenanceSettings
{
    /**
     * The routes that should be reachable while maintenance mode is enabled.
     */
    protected array $exceptRoutes = [
        'maintenance',
        'login',
        'login.*',
        'password.*',
        'logout',
        'admin.*',
    ];

    /**
     * The paths that should be reachable while maintenance mode is enabled.
     */
    protected array $except = [
        'user/login',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
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
            $normalized = Str::endsWith($path, '/*')
                ? Str::replaceLast('/*', '*', $path)
                : $path;

            return trim($normalized, '/');
        }, setting('maintenance.paths', []));

        if (! empty($blockedPaths) && ! $request->is($blockedPaths)) {
            return $next($request);
        }

        return $this->renderMaintenanceView();
    }

    protected function renderMaintenanceView(): Response
    {
        $maintenanceMessage = setting('maintenance.message', trans('messages.maintenance.message'));

        return response()->view('maintenance', [
            'maintenanceMessage' => new HtmlString($maintenanceMessage),
        ], 503);
    }
}
