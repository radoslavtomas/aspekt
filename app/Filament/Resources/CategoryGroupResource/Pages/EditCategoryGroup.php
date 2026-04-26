<?php

namespace App\Filament\Resources\CategoryGroupResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\CategoryGroupResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryGroup extends EditRecord
{
    protected static string $resource = CategoryGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
