<?php

namespace Azuriom\Rules;

use Closure;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;

class GameAuth implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $id = game()->getUserUniqueId($value);

            if ($id) {
                return;
            }
        } catch (Exception) {
            // Fallthrough
        }

        $fail(trans('validation.game_auth', ['game' => game()->name()]));
    }
}
