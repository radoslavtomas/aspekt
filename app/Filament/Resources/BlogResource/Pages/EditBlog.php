<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // dd($data);
        $data['feature_img'] = $data['feature_img'] ? '/' . $data['feature_img'] : null;

        // @TODO: implement everywhere or better
        $data['links'] = $data['links'] === '<p></p>' ? '' : $data['links'];

        return $data;
    }
}
