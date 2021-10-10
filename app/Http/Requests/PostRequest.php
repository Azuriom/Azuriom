<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Rules\Slug;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The checkboxes attributes.
     *
     * @var array
     */
    protected $checkboxes = [
        'is_pinned',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $post = $this->route('post');

        return [
            'translations.*.locale' => ['required', Rule::in(get_available_locales_codes())],
            'translations.*.title' => ['required', 'string', 'max:150'],
            'translations.*.description' => ['required', 'string', 'max:255'],
            'translations.*.content' => ['required', 'string'],
            'slug' => ['required', 'string', 'max:100', new Slug(), Rule::unique('posts')->ignore($post, 'slug')],
            'published_at' => ['required', 'date'],
            'is_pinned' => ['filled', 'boolean'],
            'image' => ['nullable', 'image'],
        ];
    }
}
