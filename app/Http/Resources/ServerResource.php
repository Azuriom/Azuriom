<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Server */
class ServerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'address' => $this->when($this->join_url === null, $this->fullAddress()),
            'join_url' => $this->whenNotNull($this->join_url),
            'online' => $this->isOnline(),
            'players' => $this->whenNotNull($this->getOnlinePlayers()),
            'max_players' => $this->whenNotNull($this->getMaxPlayers()),
        ];
    }
}
