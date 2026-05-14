<?php

namespace App\Filament\Resources\Navigations\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Navigations\NavigationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditNavigation extends EditRecord
{
    protected static string $resource = NavigationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('navigation');
    }
}
