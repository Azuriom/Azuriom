<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Models\NavbarElement;
use Azuriom\Models\Page;
use Azuriom\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NavbarElementRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The attributes represented by checkboxes.
     *
     * @var array<int, string>
     */
    protected array $checkboxes = [
        'new_tab',
    ];

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->mergeCheckboxes();

        $this->merge(['value' => $this->getLinkValue()]);

        if (! $this->filled('restricted')) {
            $this->merge(['roles' => null]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'icon' => ['nullable', 'string', 'max:100'],
            'type' => ['string', Rule::in(NavbarElement::types())],
            'link' => ['required_if:type,link', 'nullable', 'string', 'max:150'],
            'plugin' => ['required_if:type,plugin', 'nullable', Rule::in(plugins()->getRouteDescriptions()->keys())],
            'value' => ['sometimes'],
            'new_tab' => ['filled', 'boolean'],
            'roles.*' => ['required', 'integer', 'exists:roles,id'],
        ];
    }

    /**
     * Get the link value to store.
     */
    protected function getLinkValue(): string
    {
        $type = $this->input('type');

        switch ($type) {
            case 'page':
                $page = Page::find($this->input('page'));

                return $page ? $page->slug : '';
            case 'post':
                $post = Post::find($this->input('post'));

                return $post ? $post->slug : '';
            case 'link':
            case 'plugin':
                return $this->input($type);
            default:
                return '#';
        }
    }
}
