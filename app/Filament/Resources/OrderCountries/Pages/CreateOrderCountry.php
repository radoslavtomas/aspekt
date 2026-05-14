<?php

namespace App\Filament\Resources\OrderCountries\Pages;

use App\Filament\Resources\OrderCountries\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderCountry extends CreateRecord
{
    protected static string $resource = OrderCountryResource::class;
}
