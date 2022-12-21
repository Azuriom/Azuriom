<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Comment */
class CommentResource extends JsonResource
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
            'author' => new UserResource($this->author),
            'content' => $this->content,
        ];
    }
}
