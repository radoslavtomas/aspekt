<?php

namespace App\Filament\Resources\OrderCountries\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\OrderCountries\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderCountry extends EditRecord
{
    protected static string $resource = OrderCountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
