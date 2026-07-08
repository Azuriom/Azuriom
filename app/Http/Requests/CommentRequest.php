<?php

namespace Azuriom\Http\Requests;

use Azuriom\Models\Comment;
use Azuriom\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $post = $this->route('post');

        if (! $post instanceof Post || ! $this->user()?->can('view', $post)) {
            return false;
        }

        return $this->user()->can('create', Comment::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'max:500'],
        ];
    }
}
