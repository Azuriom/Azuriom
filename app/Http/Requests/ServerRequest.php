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
            'rcon-password' => ['required_if:type,mc-rcon,source-rcon', 'nullable', 'string'],
            'query-port' => ['nullable', 'integer', 'between:1,65535'],
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
        $data = null;
        $type = $this->input('type');

        if (in_array($type, ['mc-rcon', 'source-rcon', 'rust-rcon'], true)) {
            $data = [
                'query-port' => $this->input('query-port'),
                'rcon-port' => $this->input('rcon-port'),
                'rcon-password' => encrypt($this->input('rcon-password'), false),
            ];
        } elseif ($type === 'source-query') {
            $data = [
                'query-port' => $this->input('query-port'),
            ];
        } elseif ($type === 'mc-azlink') {
            $data = ['azlink-ping' => $this->filled('azlink-ping')];

            if ($this->filled('azlink-custom-port')) {
                $data['azlink-port'] = $this->input('azlink-port');
            }
        }

        $validated = $this->validator->validated();

        if ($data !== null) {
            $validated['data'] = array_filter($data);
        }

        return $validated;
    }
}
