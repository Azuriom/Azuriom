<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Post */
class PostResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'url' => route('posts.show', $this->slug),
            'content' => $this->content,
            'author' => new UserResource($this->author),
            'published_at' => $this->published_at->toIso8601String(),
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'image' => $this->whenNotNull($this->imageUrl()),
        ];
    }
}
