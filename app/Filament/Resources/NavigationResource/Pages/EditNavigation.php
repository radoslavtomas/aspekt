<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use App\Filament\Resources\NavigationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('navigation');
    }
}
