<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

class VerifyCaptcha
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
        $secretKey = setting('recaptcha-secret-key');

        if (empty($secretKey)) {
            return $next($request);
        }

        $reCaptcha = new ReCaptcha($secretKey, new CurlPost());

        $response = $reCaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        if ($response->isSuccess()) {
            return $next($request);
        }

        return redirect()->back()->with('error', trans('messages.captcha'))->withInput();
    }
}
