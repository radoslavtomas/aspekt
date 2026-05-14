<?php

namespace App\Filament\Resources\Downloads\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Downloads\DownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditDownload extends EditRecord
{
    protected static string $resource = DownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
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
