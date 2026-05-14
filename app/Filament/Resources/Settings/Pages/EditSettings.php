<?php

namespace App\Filament\Resources\Settings\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Settings\SettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditSettings extends EditRecord
{
    protected static string $resource = SettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('settings');
    }
}
