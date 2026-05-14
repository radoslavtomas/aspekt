<?php

namespace App\Filament\Resources\OrderItems\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\OrderItems\OrderItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderItems extends ListRecords
{
    protected static string $resource = OrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
