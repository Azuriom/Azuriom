<?php

namespace Azuriom\Http\Middleware;

use Azuriom\Models\Server;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VerifyServerToken
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
        $token = $request->header('Azuriom-Link-Token');

        // TODO 1.0: remove legacy token support
        if ($token === null) {
            $token = $this->getLegacyToken($request);
        }

        abort_if($token === null, 401, 'No server key provided.');

        $server = Server::firstWhere('token', $token);

        abort_if($server === null, 403, 'Invalid server key.');

        $request->merge(['server-id' => $server->id]);

        return $next($request);
    }

    protected function getLegacyToken(Request $request)
    {
        $token = $request->bearerToken();

        if ($token !== null) {
            return $token;
        }

        $header = $request->header('Authorization');

        if ($header === null || ! Str::startsWith($header, 'Basic ')) {
            return null;
        }

        return base64_decode(Str::substr($header, 6), true);
    }
}
