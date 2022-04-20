<?php

namespace Azuriom\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array<int, string>|string|null
     */
    protected $proxies;

    /**
     * The headers that should be used to detect proxies.
     *
     * @var int
     */
    protected $headers =
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO;

    /**
     * Sets the trusted proxies on the request to the value of 'trustedproxy.proxies'.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    protected function setTrustedProxyIpAddresses(Request $request)
    {
        parent::setTrustedProxyIpAddresses($request);

        if (! $request->secure() && $request->header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
