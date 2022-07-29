<?php

namespace App\Filament\Resources\OrderCountryResource\Pages;

use App\Filament\Resources\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderCountries extends ListRecords
{
    protected static string $resource = OrderCountryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
