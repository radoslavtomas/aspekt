<?php

namespace App\Filament\Resources\Translations\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Translations\TranslationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditTranslation extends EditRecord
{
    protected static string $resource = TranslationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('translations');
    }
}
