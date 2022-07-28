<?php

namespace App\Filament\Resources\DownloadResource\Pages;

use App\Filament\Resources\DownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreateDownload extends CreateRecord
{
    protected static string $resource = DownloadResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $file = $data['filepath'];
        $data['filepath'] = '/'.$file;
        $data['filemime'] = Storage::mimeType('/'.$file);
        $data['filesize'] = Storage::size('/'.$file);
        $data['filename'] = Str::replace('downloads/', '', $file);

        return parent::mutateFormDataBeforeCreate($data);
    }
}
