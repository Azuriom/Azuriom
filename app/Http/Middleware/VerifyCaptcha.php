<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        $captchaType = setting('captcha.type');
        $secretKey = setting('captcha.secret_key');

        if (! $captchaType || empty($secretKey)) {
            return $next($request);
        }

        $success = $captchaType === 'hcaptcha'
            ? $this->verifyHCaptcha($request, $secretKey)
            : $this->verifyReCaptcha($request, $secretKey);

        return $success ? $next($request) : $this->sendFailedResponse($request);
    }

    protected function sendFailedResponse(Request $request)
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'captcha',
                'message' => trans('messages.captcha'),
            ], 423);
        }

        return redirect()->back()->with('error', trans('messages.captcha'))->withInput();
    }

    protected function verifyReCaptcha(Request $request, string $secretKey)
    {
        $reCaptcha = new ReCaptcha($secretKey, new CurlPost());

        $response = $reCaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        return $response->isSuccess();
    }

    protected function verifyHCaptcha(Request $request, string $secretKey)
    {
        $code = $request->input('h-captcha-response');

        if ($code === null) {
            return false;
        }

        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => $secretKey,
            'response' => $code,
        ]);

        return $response->successful() && $response->json('success');
    }
}
