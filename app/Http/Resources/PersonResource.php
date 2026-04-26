<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_id' => $this->type_id,
            'title' => $this->title,
            'slug' => $this->slug,
            'avatar' => $this->avatar,
            'teaser' => $this->teaser,
            'body' => $this->body,
            'links' => $this->links,
        ];
    }
}
