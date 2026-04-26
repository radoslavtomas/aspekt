<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;
use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
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
            'filename' => $this->filename,
            'filepath' => $this->filepath,
            'filemime' => $this->filemime,
            'filesize' => formatFileSizeUnits($this->filesize)
        ];
    }
}
