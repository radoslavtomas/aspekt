<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Illuminate\Http\Resources\Json\JsonResource;

class PeopleResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'avatar' => $this->avatar,
            'teaser' => $this->teaser,
        ];
    }
}
