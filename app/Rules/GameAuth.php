<?php

namespace Azuriom\Rules;

use Exception;
use Illuminate\Contracts\Validation\Rule;

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

            return $id !== false;
        } catch (Exception) {
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
        return trans('validation.game_auth', ['game' => game()->name()]);
    }
}
