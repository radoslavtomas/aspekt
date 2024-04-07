<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // dd($this->date_start);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'slug' => $this->slug,
            'authors' => $this->authors,
            'teaser' => $this->teaser,
            'date_start' => $this->date_start ? $this->date_start->format('d.m.Y') : '',
            'time_start' => $this->time_start ? $this->time_start->format('H:i') : '',
            'date_end' => $this->date_end ? $this->date_end->format('d.m.Y') : '',
            'time_end' => $this->time_end ? $this->time_end->format('H:i') : '',
            'place' => $this->place,
            'featured' => $this->featured,
            'feature_img' => $this->feature_img ? '/storage'.$this->feature_img : null,
        ];
    }
}
