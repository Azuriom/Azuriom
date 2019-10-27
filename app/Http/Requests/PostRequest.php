<?php

namespace Azuriom\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
            'slug' => ['required', 'string', 'max:100', 'alpha_dash', Rule::unique('posts')->ignore($this->post, 'slug')],
            'image_id' => ['nullable', 'exists:images,id'],
            'content' => ['required', 'string'],
            'published_at' => ['required', 'date']
        ];
    }
}
