<?php

namespace Azuriom\Rules;

use Azuriom\Games\Minecraft\MinecraftBedrockGame;
use Illuminate\Contracts\Validation\Rule;

class Username implements Rule
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
        if (oauth_login() || game() instanceof MinecraftBedrockGame) {
            return true;
        }

        return preg_match('/^[A-Za-z0-9_*.]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.username');
    }
}
