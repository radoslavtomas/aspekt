<?php

namespace App\Filament\Resources\Blogs\Pages;

use Filament\Actions\CreateAction;
use App\Filament\Resources\Blogs\BlogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogs extends ListRecords
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [25, 40, 70];
    }
}
