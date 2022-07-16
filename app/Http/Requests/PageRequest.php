<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->mergeCheckboxes();

        if (! $this->filled('restricted')) {
            $this->merge(['roles' => null]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $page = $this->route('page');

        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:100', new Slug(true), Rule::unique('pages')->ignore($page, 'slug')],
            'content' => ['required', 'string'],
            'is_enabled' => ['filled', 'boolean'],
            'roles.*' => ['required', 'integer', 'exists:roles,id'],
        ];
    }
}
