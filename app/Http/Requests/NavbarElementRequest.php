<?php

namespace Azuriom\Http\Requests;

use Azuriom\Models\NavbarElement;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NavbarElementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'type' => ['string', Rule::in(NavbarElement::types())]
        ];
    }
}
