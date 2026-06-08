<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\Role;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->disabled(fn(?User $record
                    ) => // Disable on edit for users who are neither the record owner nor an admin
                        $record && !(auth()->check() && (auth()->id() === $record->id || auth()->user()->role_id === Role::Admin))
                    ),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: TRUE)
                    ->disabled(fn(?User $record
                    ) => // Disable on edit for users who are neither the record owner nor an admin
                        $record && !(auth()->check() && (auth()->id() === $record->id || auth()->user()->role_id === Role::Admin))
                    ),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn(CreateUser::class),
            ]);
    }

}
