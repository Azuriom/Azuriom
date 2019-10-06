<?php

namespace Azuriom\Http\Middleware;

use Closure;
use ReCaptcha\ReCaptcha;

class VerifyCaptcha
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
        $secretKey = setting('recaptcha-secret-key');

        if (empty($secretKey)) {
            return $next($request);
        }

        $reCaptcha = new ReCaptcha($secretKey);

        $response = $reCaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if ($response->isSuccess()) {
            return $next($request);
        }

        return redirect()->back()->with('error', 'reCaptcha verification failed')->withInput();
    }
}
