<?php

namespace App\Filament\Resources\Settings\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Settings\SettingsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSettings extends ListRecords
{
    protected static string $resource = SettingsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
