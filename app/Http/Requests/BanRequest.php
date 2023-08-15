<?php

namespace Azuriom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'reason' => ['required', 'string', 'max:255'],
        ];
    }
}
