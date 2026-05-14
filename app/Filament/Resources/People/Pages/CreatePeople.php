<?php

namespace App\Filament\Resources\People\Pages;

use App\Filament\Resources\People\PeopleResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePeople extends CreateRecord
{
    protected static string $resource = PeopleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
