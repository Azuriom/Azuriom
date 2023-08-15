<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\User */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => new RoleResource($this->role),
            'registered' => $this->created_at->toIso8601String(),
        ];
    }
}
