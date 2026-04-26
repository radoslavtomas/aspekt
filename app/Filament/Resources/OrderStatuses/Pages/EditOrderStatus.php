<?php

namespace App\Filament\Resources\OrderStatuses\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\OrderStatuses\OrderStatusResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderStatus extends EditRecord
{
    protected static string $resource = OrderStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
