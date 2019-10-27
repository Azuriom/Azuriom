<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Color;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:25'],
            'color' => ['required', new Color()],
        ];
    }
}
