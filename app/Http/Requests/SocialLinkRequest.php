<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Color;
use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => ['required', 'string', 'max:100'],
            'value' => ['required', 'url', 'max:100'],
            'title' => ['required_if:type,other', 'nullable', 'string', 'max:50'],
            'icon' => ['required_if:type,other', 'nullable', 'string', 'max:50'],
            'color' => ['required_if:type,other', 'nullable', new Color()],
        ];
    }
}
