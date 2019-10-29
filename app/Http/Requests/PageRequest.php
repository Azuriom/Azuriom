<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:100', new Slug(), Rule::unique('pages')->ignore($this->page, 'slug')],
            'content' => ['required', 'string']
        ];
    }
}
