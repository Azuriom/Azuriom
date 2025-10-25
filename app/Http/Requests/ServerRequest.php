<?php

namespace Azuriom\Http\Requests;

use Azuriom\Http\Requests\Traits\ConvertCheckbox;
use Azuriom\Models\Server;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServerRequest extends FormRequest
{
    use ConvertCheckbox;

    /**
     * The attributes represented by checkboxes.
     *
     * @var array<int, string>
     */
    protected array $checkboxes = [
        'home_display',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
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
            'join_url' => ['sometimes', 'nullable', 'regex:/^[a-z0-9+\-.]+:\/\/[^\s]+$/i', 'max:100'],
            'home_display' => ['filled', 'boolean'],
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    public function passedValidation(): void
    {
        $type = $this->input('type');

        if (Str::endsWith($type, 'rcon')) {
            $this->merge([
                'data' => [
                    'query-port' => $this->input('query-port'),
                    'rcon-port' => $this->input('rcon-port'),
                    'rcon-password' => encrypt($this->input('rcon-password'), false),
                ],
            ]);

            return;
        }

        if ($type === 'source-query') {
            $this->merge([
                'data' => ['query-port' => $this->input('query-port')],
            ]);

            return;
        }

        if (Str::endsWith($type, 'azlink')) {
            $data = ['azlink-ping' => $this->filled('azlink-ping')];

            if ($this->filled('azlink-custom-port')) {
                $data['azlink-port'] = $this->input('azlink-port');
            }

            $this->merge(['data' => $data]);
        }
    }
}
