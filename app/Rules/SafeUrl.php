<?php

namespace Azuriom\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Stringable;

class SafeUrl implements ValidationRule
{
    private const DENIED_SCHEMES = [
        'data',
        'file',
        'javascript',
        'vbscript',
        'view-source',
    ];

    private ?array $schemes;

    private bool $allowRelative;

    public function __construct(?array $schemes = null, bool $allowRelative = false)
    {
        $this->schemes = $schemes;
        $this->allowRelative = $allowRelative;
    }

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

        if ($url === '' || preg_match('/[\x00-\x20\x7F]/', $url)) {
            $fail(trans('validation.url'));

            return;
        }

        if ($this->allowRelative && $this->isSafeRelativeUrl($url)) {
            return;
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        if ($scheme === null) {
            $fail(trans('validation.url'));

            return;
        }

        $scheme = strtolower($scheme);

        if (
            ! preg_match('/^[a-z][a-z0-9+\-.]*$/', $scheme)
            || in_array($scheme, self::DENIED_SCHEMES, true)
            || ($this->schemes !== null && ! in_array($scheme, $this->schemes, true))
        ) {
            $fail(trans('validation.url'));

            return;
        }

        if (in_array($scheme, ['http', 'https'], true) && parse_url($url, PHP_URL_HOST) === null) {
            $fail(trans('validation.url'));
        }
    }

    private function isSafeRelativeUrl(string $url): bool
    {
        if (str_starts_with($url, '//') || str_starts_with($url, '/\\')) {
            return false;
        }

        return str_starts_with($url, '/') || str_starts_with($url, '#') || str_starts_with($url, '?');
    }
}
