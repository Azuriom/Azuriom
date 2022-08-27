<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyDownloadActionsViaPanel
{

    public function handle(Request $request, Closure $next)
    {
        abort_if(! env('ALLOW_PANEL_DOWNLOAD_ACTIONS', true), 405, 'This function is disabled.');
        return $next($request);
    }
}
