<?php

namespace Azuriom\Http\Middleware;

use Azuriom\Models\Server;
use Closure;
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
        $token = $request->bearerToken();

        // TODO remove legacy token support
        if ($token === null) {
            $header = $request->header('Authorization', '');

            if (Str::startsWith($header, 'Basic ')) {
                $token = base64_decode(Str::substr($header, 6));
            }
        }

        abort_if($token === null, 401, 'No server key provided.');

        $server = Server::firstWhere('token', $token);

        abort_if($server === null, 403, 'Invalid server key.');

        $request->merge(['server-id' => $server->id]);

        return $next($request);
    }
}
