<?php

namespace App\Filament\Resources\Navigations\Pages;

use App\Filament\Resources\Navigations\NavigationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateNavigation extends CreateRecord
{
    protected static string $resource = NavigationResource::class;

    protected function afterCreate(): void
    {
        Cache::forget('navigation');
    }
}
