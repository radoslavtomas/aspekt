<?php

namespace App\Filament\Resources\Users;

use App\Enums\Role;
use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource {

    protected static ?string $model = User::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|\UnitEnum|null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema {
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

    public static function table(Table $table): Table {
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
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

    //    public static function canViewAny(): bool {
    //        return auth()->check() && auth()->user()->role_id === Role::Admin;
    //    }
    //
    //    public static function canCreate(): bool {
    //        return auth()->check() && auth()->user()->role_id === Role::Admin;
    //    }
    //
    //    public static function canEdit(\Illuminate\Database\Eloquent\Model $record
    //    ): bool {
    //        return auth()->check() && auth()->user()->role_id === Role::Admin;
    //    }
    //
    //    public static function canDelete(\Illuminate\Database\Eloquent\Model $record
    //    ): bool {
    //        return auth()->check() && auth()->user()->role_id === Role::Admin;
    //    }
    //
    //    public static function shouldRegisterNavigation(): bool {
    //        return auth()->check() && auth()->user()->role_id === Role::Admin;
    //    }

}
