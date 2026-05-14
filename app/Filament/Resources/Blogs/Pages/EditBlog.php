<?php

namespace App\Filament\Resources\Blogs\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\Blogs\BlogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['language'] = isset($data['language']) ? $data['language'] : 'sk';
        // dd($data);
        $data['feature_img'] = $data['feature_img'] ? '/' . $data['feature_img'] : null;

        // @TODO: implement everywhere or better
        $data['links'] = $data['links'] === '<p></p>' ? '' : $data['links'];

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
