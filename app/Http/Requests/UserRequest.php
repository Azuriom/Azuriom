<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Username;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

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
            'email' => [
                oauth_login() ? 'nullable' : 'required',
                'email', 'max:50', Rule::unique('users')->ignore($user, 'email'),
            ],
            'password' => [Rule::requiredIf($user === null), 'nullable', Password::default()],
            'money' => ['filled', 'numeric', 'min:0'],
            'role' => ['required', 'integer', 'exists:roles,id'],
        ];
    }
}
