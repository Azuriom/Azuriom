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
            'username' => $this->name,
            'email' => $this->email,
            'email_verified' => $this->email_verified_at !== null,
            'money' => $this->money,
            'role' => new RoleResource($this->role),
            'banned' => $this->is_banned,
            'uuid' => $this->game_id,
            'access_token' => $this->access_token,
            'created_at' => $this->created_at->toIso8601String()
        ];
    }
}
