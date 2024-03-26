<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventExtResource extends JsonResource
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
            'subtitle' => $this->subtitle,
            'authors' => $this->authors,
            'teaser' => $this->teaser,
            'body' => $this->body,
            'date' => $this->date ? $this->date->format('d.m.Y H:i') : '',
            'place' => $this->place,
            'links' => $this->links,
            'feature_img' => $this->feature_img ? '/storage'.$this->feature_img : null,
            'created_at' => $this->created_at->format('d/m/y')
        ];
    }
}
