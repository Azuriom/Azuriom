<?php

namespace Azuriom\Http\Middleware;

use Azuriom\Models\Server;
use Closure;
use Illuminate\Http\Request;

class VerifyServerToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Azuriom-Link-Token');

        abort_if($token === null, 401, 'No server key provided.');

        $server = Server::firstWhere('token', $token);

        abort_if($server === null, 403, 'Invalid server key.');

        $request->merge(['server-id' => $server->id]);

        return $next($request);
    }
}
