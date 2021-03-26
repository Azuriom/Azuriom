<?php

namespace Azuriom\Http\Resources;

use Azuriom\Http\Resources\Comment as CommentResource;
use Azuriom\Http\Resources\User as UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Post */
class Post extends JsonResource
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
            'image' => $this->imageUrl(),
        ];
    }
}
