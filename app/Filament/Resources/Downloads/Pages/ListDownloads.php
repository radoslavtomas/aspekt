<?php

namespace App\Filament\Resources\Downloads\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Downloads\DownloadResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDownloads extends ListRecords
{
    protected static string $resource = DownloadResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
