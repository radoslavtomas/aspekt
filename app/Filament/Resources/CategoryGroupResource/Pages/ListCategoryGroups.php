<?php

namespace App\Filament\Resources\CategoryGroupResource\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\CategoryGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryGroups extends ListRecords
{
    protected static string $resource = CategoryGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
