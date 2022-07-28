<?php

namespace App\Filament\Resources\DownloadResource\Pages;

use App\Filament\Resources\DownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditDownload extends EditRecord
{
    protected static string $resource = DownloadResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $file = $data['filepath'];
        $data['filepath'] = '/'.$file;
        $data['filemime'] = Storage::mimeType('/'.$file);
        $data['filesize'] = Storage::size('/'.$file);
        $data['filename'] = Str::replace('downloads/', '', $file);

        return parent::mutateFormDataBeforeSave($data);
    }
}
