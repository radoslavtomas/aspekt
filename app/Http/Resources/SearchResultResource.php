<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResultResource extends JsonResource
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
            'slug' => $this->slug,
            'teaser' => empty($this->teaser) ? $this->subtitle : $this->teaser,
            'link' => $this->getResourceUri($this['resourceType']).$this['slug'],
            'type' => $this['resourceType'],
            'created_at' => $this['created_at']->format('d.m.Y'),
        ];
    }

    private function getResourceUri($type)
    {
        switch ($type) {
            case 'blog':
                return '/aspektin/vsetko/';
            case 'book':
                return '/books/vsetko/';
            case 'kto-je-kto':
                return '/about/kto-je-kto/';
            case 'autorky':
                return '/books/autorky-redaktorky-prekladatelky/';
            case 'event':
                return '/events/';
            case 'page':
            default:
                return '/';
        }
    }
}
