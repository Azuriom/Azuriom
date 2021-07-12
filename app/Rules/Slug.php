<?php

namespace Azuriom\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Slug implements Rule
{
    private $allowSlashes;

    public function __construct(bool $allowSlashes = false)
    {
        $this->allowSlashes = $allowSlashes;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->allowSlashes) {
            return preg_match('/^[a-z0-9-\/]+$/', $value)
                && ! Str::startsWith($value, '/')
                && ! Str::endsWith($value, '/');
        }

        return preg_match('/^[a-z0-9-]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.slug');
    }
}
