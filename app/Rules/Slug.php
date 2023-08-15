<?php

namespace Azuriom\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Str;

class Slug implements ValidationRule
{
    private bool $allowSlashes;

    public function __construct(bool $allowSlashes = false)
    {
        $this->allowSlashes = $allowSlashes;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! $this->isValidSlug($value)) {
            $fail(trans('validation.slug'));
        }
    }

    protected function isValidSlug(string $slug)
    {
        if ($this->allowSlashes) {
            return preg_match('/^[a-z0-9-\/]+$/', $slug)
                && ! Str::startsWith($slug, '/')
                && ! Str::endsWith($slug, '/');
        }

        return preg_match('/^[a-z0-9-]+$/', $slug);
    }
}
