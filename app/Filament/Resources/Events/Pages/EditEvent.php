<?php

namespace App\Filament\Resources\Events\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Events\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    protected static string $resource = EventResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // dd($data);

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
