<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\FileResource;

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
            'aspekt_price' => number_format($this->aspekt_price ? $this->aspekt_price/100 : null, 2) . " €",
            'common_price' => number_format($this->common_price ? $this->common_price/100 : null, 2) . " €",
            'pages' => $this->pages,
            'isbn' => $this->ISBN,
            'files' => FileResource::collection($this->files),
            'downloads' => FileResource::collection($this->downloads),
        ];
    }
}
