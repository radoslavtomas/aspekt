<?php

namespace App\Filament\Resources\OrderStatuses\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\OrderStatuses\OrderStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderStatuses extends ListRecords
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
