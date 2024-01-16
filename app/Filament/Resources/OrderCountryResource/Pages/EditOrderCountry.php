<?php

namespace App\Filament\Resources\OrderCountryResource\Pages;

use App\Filament\Resources\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderCountry extends EditRecord
{
    protected static string $resource = OrderCountryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
