<?php

namespace Azuriom\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Color implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! preg_match('/^#[a-f0-9]{6}$/', $value)) {
            $fail(trans('validation.color'));
        }
    }
}
