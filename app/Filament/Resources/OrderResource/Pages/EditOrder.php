<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['order_total']= $data['order_total'] * 100;
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['order_total'] = $data['order_total'] / 100;
        return $data;
    }
}
