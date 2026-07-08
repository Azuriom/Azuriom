<?php

namespace Azuriom\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Stringable;

class DiscordWebhookUrl implements ValidationRule
{
    private const ALLOWED_HOSTS = [
        'discord.com',
        'discordapp.com',
        'canary.discord.com',
        'ptb.discord.com',
    ];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value === null || $value === '') {
            return;
        }

        if (! is_string($value) && ! $value instanceof Stringable) {
            $fail(trans('validation.url'));

            return;
        }

        $url = trim((string) $value);
        $scheme = parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);
        $path = parse_url($url, PHP_URL_PATH);

        if (
            $scheme !== 'https'
            || $host === null
            || ! in_array(strtolower(rtrim($host, '.')), self::ALLOWED_HOSTS, true)
            || $path === null
            || ! str_starts_with($path, '/api/webhooks/')
            || parse_url($url, PHP_URL_USER) !== null
            || parse_url($url, PHP_URL_PASS) !== null
        ) {
            $fail(trans('validation.url'));
        }
    }
}
