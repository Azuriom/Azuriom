<?php

namespace Azuriom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'max:100'],
            'value' => ['required', 'url', 'max:100'],
            'title' => ['required_if:type,other', 'nullable', 'string', 'max:50'],
            'icon' => ['required_if:type,other', 'nullable', 'string', 'max:50'],
            'color' => ['required_if:type,other', 'nullable', 'hex_color'],
        ];
    }
}
