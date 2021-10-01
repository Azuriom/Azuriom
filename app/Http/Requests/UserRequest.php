<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Username;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('user');

        return [
            'name' => ['required', 'string', 'max:25', new Username(), Rule::unique('users')->ignore($user, 'name')],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore($user, 'email')],
            'password' => [Rule::requiredIf($user === null), 'nullable', 'string', 'min:8'],
            'money' => ['filled', 'numeric', 'min:0'],
            'role' => ['required', 'integer', 'exists:roles,id'],
        ];
    }
}
