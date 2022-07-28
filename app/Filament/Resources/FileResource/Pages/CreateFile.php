<?php

namespace App\Filament\Resources\FileResource\Pages;

use App\Filament\Resources\FileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $file = $data['filepath'];
        $data['filepath'] = '/'.$file;
        $data['filemime'] = Storage::mimeType('/'.$file);
        $data['filesize'] = Storage::size('/'.$file);
        $data['filename'] = Str::replace('files/', '', $file);

        return parent::mutateFormDataBeforeCreate($data);
    }
}
