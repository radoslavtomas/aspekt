<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PageSearchResultResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        switch ($this->id) {
            case 1:
                $link = '/contact';
                break;
            case 10:
                $link = '/ochrana-osobnych-udajov';
                break;
            default:
                $link = '/'.$this->category->navigation->route.'/'.$this->category->url;
        }

        return [
            'id' => $this->id,
            'title' => $this->name_sk,
            'teaser' => Str::limit($this->body_sk, 200),
            'link' => $link,
            'type' => $this['resourceType'],
            'created_at' => $this['created_at']->format('d.m.Y'),
        ];
    }
}
