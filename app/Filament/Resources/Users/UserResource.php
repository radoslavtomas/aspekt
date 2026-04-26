<?php

namespace App\Filament\Resources\Users;

use Filament\Schemas\Schema;
use App\Filament\Resources\Users\Pages\CreateUser;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-users';

    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->email()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn(CreateUser::class)
            ]);
    }

    public static function table(Table $table): Table
    {
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
                    ->action(function (User $record, array $data) {
                        $record->update([
                            'password' => Hash::make($data['new_password'])
                        ]);
                        Filament::notify('success', 'Password updated successfully');
                    })
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
