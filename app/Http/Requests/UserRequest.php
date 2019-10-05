<?php

namespace Azuriom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:25', 'alpha_dash', Rule::unique('users')->ignore($this->user, 'name')],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('users')->ignore($this->user, 'email')],
            'password' => [($this->user !== null ? 'nullable' : 'required'), 'string', 'min:8'],
            'role' => ['required', 'integer', 'exists:roles,id']
        ];
    }
}
