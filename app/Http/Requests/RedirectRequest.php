<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RedirectRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The checkboxes attributes.
     *
     * @var array
     */
    protected $checkboxes = [
        'is_enabled',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $redirect = $this->route('redirect');

        return [
            'source' => ['required', 'string', 'max:100', new Slug(true), Rule::unique('redirects')->ignore($redirect, 'source')],
            'destination' => ['required', 'string', 'max:255'],
            'code' => ['required', 'in:301,302'],
            'is_enabled' => ['filled', 'boolean'],
        ];
    }
}
