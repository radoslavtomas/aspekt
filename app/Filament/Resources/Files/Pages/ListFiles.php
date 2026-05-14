<?php

namespace App\Filament\Resources\Files\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Files\FileResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFiles extends ListRecords
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
