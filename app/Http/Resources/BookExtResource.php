<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookExtResource extends JsonResource
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
            'slug' => $this->slug,
            'subtitle' => $this->subtitle,
            'authors' => $this->authors,
            'editors' => $this->editors,
            'translation' => $this->translation,
            'cover' => $this->cover,
            'teaser' => $this->teaser,
            'body' => $this->body,
            'sample' => $this->sample,
            'links' => $this->links,
            'is_product' => $this->is_product,
            'is_ebook' => $this->is_ebook,
            'eshop_links' => $this->eshop_links,
            'aspekt_price_raw' => $this->aspekt_price,
            'aspekt_price' => number_format($this->aspekt_price ? $this->aspekt_price / 100 : 0, 2, ',', '.')." €",
            'common_price' => number_format($this->common_price ? $this->common_price / 100 : 0, 2, ',', '.')." €",
            'pages' => $this->pages,
            'isbn' => $this->ISBN,
            'files' => FileResource::collection($this->files),
            'downloads' => FileResource::collection($this->downloads),
        ];
    }
}
