<?php

namespace Tests\Unit;

use Azuriom\Http\Middleware\VerifyCaptcha;
use Illuminate\Http\Client\Request as HttpRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class VerifyCaptchaTest extends TestCase
{
    public function test_ddos_guard_captcha_is_verified_with_json_request(): void
    {
        Http::fake([
            'https://captcha.ddos-guard.net/siteverify' => Http::response(['success' => true]),
        ]);

        $verified = $this->middleware()->verify(
            'ddos_guard',
            Request::create('/register', 'POST', ['ddg-captcha-token' => 'captcha-token']),
            'private-key',
        );

        $this->assertTrue($verified);

        Http::assertSent(function (HttpRequest $request) {
            return $request->url() === 'https://captcha.ddos-guard.net/siteverify'
                && $request->hasHeader('Content-Type', 'application/json')
                && $request->data() === [
                    'private_key' => 'private-key',
                    'response' => 'captcha-token',
                ];
        });
    }

    public function test_ddos_guard_captcha_rejects_missing_token_without_request(): void
    {
        Http::fake();

        $verified = $this->middleware()->verify(
            'ddos_guard',
            Request::create('/register', 'POST'),
            'private-key',
        );

        $this->assertFalse($verified);
        Http::assertNothingSent();
    }

    public function test_ddos_guard_captcha_rejects_failed_verification(): void
    {
        Http::fake([
            'https://captcha.ddos-guard.net/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ]),
        ]);

        $verified = $this->middleware()->verify(
            'ddos_guard',
            Request::create('/register', 'POST', ['ddg-captcha-token' => 'invalid-token']),
            'private-key',
        );

        $this->assertFalse($verified);
    }

    private function middleware(): object
    {
        return new class extends VerifyCaptcha
        {
            public function verify(string $type, Request $request, string $secretKey): bool
            {
                return $this->verifyCaptcha($type, $request, $secretKey);
            }
        };
    }
}
