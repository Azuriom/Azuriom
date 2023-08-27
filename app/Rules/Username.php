<?php

namespace Azuriom\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Username implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (oauth_login()) {
            return;
        }

        if (! preg_match('/^[A-Za-z0-9_*.]+$/', $value)) {
            $fail(trans('validation.username'));
        }
    }
}
