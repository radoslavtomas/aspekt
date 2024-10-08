<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogExtResource extends JsonResource
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
            'authors_cite' => $this->authors_cite ?? 'red',
            'teaser' => $this->teaser,
            'body' => $this->body,
            'links' => $this->links,
            'files' => FileResource::collection($this->files),
            'downloads' => FileResource::collection($this->downloads),
            'feature_img' => $this->feature_img ? '/storage'.$this->feature_img : null,
            'created_at' => $this->created_at->format('d/m/y'),
            'year' => $this->created_at->format('Y')
        ];
    }
}
