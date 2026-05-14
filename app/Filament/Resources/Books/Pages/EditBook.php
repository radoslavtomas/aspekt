<?php

namespace App\Filament\Resources\Books\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Books\BookResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBook extends EditRecord
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['common_price']= $data['common_price'] * 100;
        $data['aspekt_price']= $data['aspekt_price'] * 100;
        return $data;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['common_price'] = $data['common_price'] / 100;
        $data['aspekt_price'] = $data['aspekt_price'] / 100;
        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
