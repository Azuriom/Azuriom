<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomRedirectRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The checkboxes attributes.
     *
     * @var array
     */
    protected $checkboxes = [
        'is_enabled', 'moved_permanently'
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'target' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:100', new Slug(true), Rule::unique('custom_redirects')->ignore($this->route('redirect'), 'slug')],
            'is_enabled' => ['filled', 'boolean'],
            'moved_permanently' => ['filled', 'boolean']
        ];
    }
}
