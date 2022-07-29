<?php

namespace App\Filament\Resources\OrderCountryResource\Pages;

use App\Filament\Resources\OrderCountryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderCountry extends CreateRecord
{
    protected static string $resource = OrderCountryResource::class;
}
