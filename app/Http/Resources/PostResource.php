<?php

namespace Azuriom\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Azuriom\Models\Post */
class PostResource extends JsonResource
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
