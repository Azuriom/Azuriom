<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPanelActions
{
    public function handle(Request $request, Closure $next)
    {
        abort_if(! config('azuriom.allowed_panel_actions.plugins', true), 405, 'This function is disabled.');
        abort_if(! config('azuriom.allowed_panel_actions.themes', true), 405, 'This function is disabled.');
        abort_if(! config('azuriom.allowed_panel_actions.azuriom', true), 405, 'This function is disabled.');

        return $next($request);
    }
}
