<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\Role;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('changePassword')
                    ->visible(fn(?User $record) => auth()->check() &&
                        (auth()->id() === $record->id || auth()->user()->role_id === Role::Admin)
                    )
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
                            ->rule(Password::default()),
                    ])
                    ->action(function(User $record, array $data) {
                        $record->update([
                            'password' => Hash::make($data['new_password']),
                        ]);
                        Notification::make()
                            ->title('Password Changed')
                            ->success()
                            ->body('Password has been updated.')
                            ->send();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

}
