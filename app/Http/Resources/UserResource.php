<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\User */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => new RoleResource($this->role),
            'registered' => $this->created_at->toIso8601String(),
        ];
    }
}
