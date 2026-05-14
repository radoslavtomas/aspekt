<?php

namespace App\Filament\Resources\Translations\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Translations\TranslationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTranslations extends ListRecords
{
    protected static string $resource = TranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
