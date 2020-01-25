<?php

namespace Azuriom\Rules;

use Illuminate\Contracts\Validation\Rule;
use Throwable;

class GameAuth implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try {
            $id = game()->getUserUniqueId($value);

           return $id !== null && $id !== false;
        } catch (Throwable $t) {
            //
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.game-auth');
    }
}
