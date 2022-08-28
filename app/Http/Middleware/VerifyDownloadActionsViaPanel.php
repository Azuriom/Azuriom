<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyDownloadActionsViaPanel
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(! env('ALLOW_PANEL_PLUGINS_ACTIONS', true), 405, 'This function is disabled.');
        abort_if(! env('ALLOW_PANEL_THEMES_ACTIONS', true), 405, 'This function is disabled.');
        abort_if(! env('ALLOW_PANEL_AZURIOM_ACTIONS', true), 405, 'This function is disabled.');

        return $next($request);
    }
}
