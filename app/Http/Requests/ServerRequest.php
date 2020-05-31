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
            'name' => ['required', 'string', 'max:50'],
            'type' => ['required', 'string', Rule::in(Server::types())],
            'address' => ['required', 'string', 'max:255'],
            'port' => ['nullable', 'integer', 'between:1,65535'],
            'rcon-port' => ['required_if:type,mc-rcon', 'nullable', 'integer', 'between:1,65535'],
            'rcon-password' => ['required_if:type,mc-rcon', 'nullable', 'string'],
            'azlink-port' => ['sometimes', 'nullable', 'integer', 'between:1,65535'],
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function validated()
    {
        $validated = $this->validator->validated();

        $type = $this->input('type');

        if ($type === 'mc-rcon') {
            $validated['data'] = [
                'rcon-port' => $this->input('rcon-port'),
                'rcon-password' => encrypt($this->input('rcon-password'), false),
            ];
        } elseif ($type === 'mc-azlink' && $this->filled('azlink-custom-port')) {
            $validated['data'] = [
                'azlink-port' => $this->input('azlink-port'),
            ];
        } else {
            $validated['data'] = null;
        }

        return $validated;
    }
}
