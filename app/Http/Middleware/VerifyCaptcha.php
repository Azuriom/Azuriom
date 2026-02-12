<?php

namespace Azuriom\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class VerifyCaptcha
{
    private const TIMEOUT = 3;

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

        return $this->verifyCaptcha($captchaType, $request, $secretKey)
            ? $next($request)
            : $this->sendFailedResponse($request);
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

    protected function verifyCaptcha(string $type, Request $request, string $secretKey): bool
    {
        $inputName = match ($type) {
            'hcaptcha' => 'h-captcha',
            'recaptcha' => 'g-recaptcha',
            'turnstile' => 'cf-turnstile',
            default => null,
        };
        $host = match ($type) {
            'hcaptcha' => 'hcaptcha.com',
            'recaptcha' => 'www.google.com/recaptcha/api',
            'turnstile' => 'challenges.cloudflare.com/turnstile/v0',
            default => null,
        };

        if ($host === null || $inputName === null) {
            return false;
        }

        if (($code = $request->input($inputName.'-response')) === null) {
            return false;
        }

        $response = Http::asForm()->timeout(self::TIMEOUT)->post('https://'.$host.'/siteverify', [
            'secret' => $secretKey,
            'response' => $code,
            'remoteip' => $request->ip(),
        ]);

        return $response->successful() && $response->json('success');
    }
}
