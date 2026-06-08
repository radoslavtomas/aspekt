<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\Role;
use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewUser extends ViewRecord {

    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array {
        return [
            EditAction::make()
                ->visible(fn(?User $record) => auth()->check() &&
                    (auth()->id() === $record->id || auth()->user()->role_id === Role::Admin)
                ),
        ];
    }

}
