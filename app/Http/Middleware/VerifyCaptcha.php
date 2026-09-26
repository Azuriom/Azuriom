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
        return match ($type) {
            'ddos_guard' => $this->verifyDdosGuardCaptcha($request, $secretKey),
            'hcaptcha' => $this->verifySiteCaptcha(
                $request,
                $secretKey,
                'h-captcha-response',
                'https://hcaptcha.com/siteverify',
            ),
            'recaptcha' => $this->verifySiteCaptcha(
                $request,
                $secretKey,
                'g-recaptcha-response',
                'https://www.google.com/recaptcha/api/siteverify',
            ),
            'turnstile' => $this->verifySiteCaptcha(
                $request,
                $secretKey,
                'cf-turnstile-response',
                'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            ),
            default => false,
        };
    }

    protected function verifyDdosGuardCaptcha(Request $request, string $privateKey): bool
    {
        $code = $request->input('ddg-captcha-token');

        if (! is_string($code) || $code === '') {
            return false;
        }

        $response = Http::asJson()
            ->timeout(self::TIMEOUT)
            ->post('https://captcha.ddos-guard.net/siteverify', [
                'private_key' => $privateKey,
                'response' => $code,
            ]);

        return $response->successful() && $response->json('success') === true;
    }

    protected function verifySiteCaptcha(Request $request, string $secret, string $input, string $url): bool
    {
        $code = $request->input($input);

        if (! is_string($code)) {
            return false;
        }

        $response = Http::asForm()
            ->timeout(self::TIMEOUT)
            ->post($url, [
                'secret' => $secret,
                'response' => $code,
                'remoteip' => $request->ip(),
            ]);

        return $response->successful() && $response->json('success') === true;
    }
}
