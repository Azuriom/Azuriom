<?php

namespace Azuriom\Http\Resources;

use Azuriom\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ServerCollection extends ResourceCollection
{
    protected mixed $servers;

    protected ?Server $default;

    public function __construct(mixed $servers, ?Server $default)
    {
        parent::__construct($servers);

        $this->servers = $servers;
        $this->default = $default;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'default' => new ServerResource($this->default),
            'servers' => $this->collection,
        ];
    }
}
