<?php

namespace Azuriom\Http\Requests;

use Azuriom\Models\Server;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'type' => ['required', 'string', Rule::in(Server::types())],
            'ip' => ['required', 'string', 'max:255'],
            'port' => ['nullable', 'integer', 'min:1', 'max:65535'],
            'rcon-port' => ['required_if:type,mc-rcon', 'nullable', 'integer', 'min:1', 'max:65535'],
            'rcon-password' => ['required_if:type,mc-rcon', 'nullable', 'string'],
        ];
    }

    public function validated()
    {
        $validated = $this->validator->validated();

        if ($this->input('type') === 'mc-rcon') {
            $validated['data'] = [
                'rcon-port' => $this->input('rcon-port'),
                'rcon-password' => encrypt($this->input('rcon-password'), false)
            ];
        } else {
            $validated['data'] = null;
        }

        return $validated;
    }
}
