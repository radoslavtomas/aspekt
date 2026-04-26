<?php

namespace App\Filament\Resources\Navigations\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Navigations\NavigationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNavigations extends ListRecords
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
