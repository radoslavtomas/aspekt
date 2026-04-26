<?php

namespace App\Filament\Resources\People\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\People\PeopleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeople extends ListRecords
{
    protected static string $resource = PeopleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
