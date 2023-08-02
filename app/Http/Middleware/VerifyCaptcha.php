<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use ReCaptcha\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;
use Symfony\Component\HttpFoundation\Response;

class VerifyCaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $captchaType = setting('captcha.type');
        $secretKey = setting('captcha.secret_key');

        if (! $captchaType || empty($secretKey)) {
            return $next($request);
        }

        $success = $captchaType === 'recaptcha'
            ? $this->verifyReCaptcha($request, $secretKey)
            : $this->verifyCaptcha($captchaType, $request, $secretKey);

        return $success ? $next($request) : $this->sendFailedResponse($request);
    }

    protected function sendFailedResponse(Request $request): Response
    {
        if ($request->expectsJson()) {
            return response()->json([
                'error' => 'captcha',
                'message' => trans('messages.captcha'),
            ], 423);
        }

        return redirect()->back()->with('error', trans('messages.captcha'))->withInput();
    }

    protected function verifyReCaptcha(Request $request, string $secretKey): bool
    {
        $reCaptcha = new ReCaptcha($secretKey, new CurlPost());

        $response = $reCaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

        return $response->isSuccess();
    }

    protected function verifyCaptcha(string $type, Request $request, string $secretKey): bool
    {
        $inputName = $type === 'hcaptcha' ? 'h-captcha' : 'cf-turnstile';
        $host = $type === 'hcaptcha' ? 'hcaptcha.com' : 'challenges.cloudflare.com/turnstile/v0';

        if (($code = $request->input($inputName.'-response')) === null) {
            return false;
        }

        $response = Http::asForm()->post('https://'.$host.'/siteverify', [
            'secret' => $secretKey,
            'response' => $code,
        ]);

        return $response->successful() && $response->json('success');
    }
}
