<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'slug' => $this->slug,
            'authors' => $this->authors,
            'cover' => $this->cover,
            'teaser' => $this->teaser,
            'is_product' => $this->is_product,
            'aspekt_price_raw' => $this->aspekt_price,
            'aspekt_price' => number_format($this->aspekt_price ? $this->aspekt_price / 100 : 0, 2, ',', '.')." €",
        ];
    }
}
