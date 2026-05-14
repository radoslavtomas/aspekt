<?php

namespace App\Filament\Resources\People\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\People\PeopleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeople extends EditRecord
{
    protected static string $resource = PeopleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['language'] = isset($data['language']) ? $data['language'] : 'sk';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
