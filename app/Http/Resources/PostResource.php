<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Request;

/**
 * Class PostResource
 * @package App\Http\Resources
 *
 * @mixin Post
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'likes' => $this->likes,
            'tags' => TagResource::collection($this->whenLoaded('tags')),
        ];
    }
}
