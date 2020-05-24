<?php

namespace Azuriom\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Color implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, $key, $value, $attributes)
    {
        return "#{$value}";
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  array  $value
     * @param  array  $attributes
     * @return string|array
     */
    public function set($model, $key, $value, $attributes)
    {
        $color = str_replace('#', '', $value);

        // Convert short hex colors
        if (strlen($color) === 3) {
            return $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        }

        return $color;
    }
}
