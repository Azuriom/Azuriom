<?php

namespace Azuriom\Http\Requests;

use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $image = $this->route('image');

        return [
            'name' => ['required', 'string', 'max:50'],
            'slug' => ['required', 'string', 'max:100', new Slug()],
            'image' => [Rule::requiredIf($image === null), 'nullable', 'image'],
        ];
    }
}
