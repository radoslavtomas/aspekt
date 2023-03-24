<?php

namespace App\Filament\Resources\NavigationResource\Pages;

use App\Filament\Resources\NavigationResource;
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
