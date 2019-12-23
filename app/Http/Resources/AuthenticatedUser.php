<?php

namespace Azuriom\Http\Resources;

use Azuriom\Http\Resources\Role as RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthenticatedUser extends JsonResource
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
            'email' => $this->email,
            'money' => $this->money,
            'role' => new RoleResource($this->role),
            'uuid' => $this->game_id,
            'access_token' => $this->access_token,
            'registered_at' => $this->created_at->toIso8601String()
        ];
    }
}
