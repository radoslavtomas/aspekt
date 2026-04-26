<?php

namespace App\Filament\Resources\OrderCountries\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\OrderCountries\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderCountries extends ListRecords
{
    protected static string $resource = OrderCountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
