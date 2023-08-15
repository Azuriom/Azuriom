<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Comment */
class CommentResource extends JsonResource
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
            'author' => new UserResource($this->author),
            'content' => $this->content,
        ];
    }
}
