<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Models\Server;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ServerRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The checkboxes attributes.
     *
     * @var array
     */
    protected $checkboxes = [
        'home_display',
    ];

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
            'rcon-port' => ['nullable', 'integer', 'between:1,65535'],
            'rcon-password' => ['required_if:type,mc-rcon,source-rcon,fivem-rcon', 'nullable', 'string'],
            'query-port' => ['nullable', 'integer', 'between:1,65535'],
            'azlink-port' => ['sometimes', 'nullable', 'integer', 'between:1,65535'],
            'join_url' => ['sometimes', 'nullable', 'url', 'max:100'],
            'home_display' => ['filled', 'boolean'],
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @param  mixed|null  $key
     * @param  mixed|null  $default
     * @return array
     */
    public function validated($key = null, $default = null)
    {
        $data = null;
        $type = $this->input('type');

        if (in_array($type, ['mc-rcon', 'source-rcon', 'rust-rcon', 'fivem-rcon'], true)) {
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
