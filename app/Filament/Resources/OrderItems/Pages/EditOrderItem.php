<?php

namespace App\Filament\Resources\OrderItems\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\OrderItems\OrderItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderItem extends EditRecord
{
    protected static string $resource = OrderItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
