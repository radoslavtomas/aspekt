<?php

namespace App\Filament\Resources\OrderCountryResource\Pages;

use App\Filament\Resources\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderCountries extends ListRecords
{
    protected static string $resource = OrderCountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
