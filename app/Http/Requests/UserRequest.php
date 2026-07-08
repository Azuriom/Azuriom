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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $user = $this->route('user');
        $email = ['sometimes', 'nullable', 'email', 'max:50', Rule::unique('users')->ignore($user, 'email')];

        return [
            'name' => [
                'required', 'string', 'max:25', new Username(), Rule::unique('users')->ignore($user, 'name'),
            ],
            'email' => $email,
            'password' => [Rule::requiredIf($user === null), 'nullable', Password::default()],
            'money' => ['filled', 'numeric', 'min:0'],
            'role' => ['required', 'integer', 'exists:roles,id'],
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $user = $this->route('user');

        $validator->after(function ($validator) use ($user) {
            if (
                $user !== null
                && ! $this->user()?->can('admin.users.personal')
                && $this->request->has('email')
                && $this->input('email') !== $user?->email
            ) {
                $validator->errors()->add('email', trans('validation.prohibited', ['attribute' => 'email']));
            }
        });
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if (! $this->filled('password')) {
            $this->request->remove('password');
        }
    }
}
