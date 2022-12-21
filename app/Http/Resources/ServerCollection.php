<?php

namespace Azuriom\Http\Resources;

use Azuriom\Models\Server;
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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'default' => new ServerResource($this->default),
            'servers' => $this->collection,
        ];
    }
}
