<?php

namespace App\Filament\Resources\Users\Pages;

use Filament\Actions\Action;
use App\Filament\Resources\Users\UserResource;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
            Action::make('changePassword')
                ->schema([
                    TextInput::make('new_password')
                        ->password()
                        ->label('New password')
                        ->required()
                        ->rule(Password::default()),
                    TextInput::make('new_password_confirmation')
                        ->password()
                        ->label('Confirm new password')
                        ->required()
                        ->same('new_password')
                        ->rule(Password::default())
                ])
                ->action(function (array $data) {
                    $this->record->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
                    Filament::notify('success', 'Password updated successfully');
                })

        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
