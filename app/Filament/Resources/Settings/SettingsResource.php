<?php

namespace App\Filament\Resources\Settings;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Settings\Pages\ListSettings;
use App\Filament\Resources\Settings\Pages\CreateSettings;
use App\Filament\Resources\Settings\Pages\EditSettings;
use App\Models\Setting;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingsResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-cog';

    protected static string | \UnitEnum | null $navigationGroup = 'Settings';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')->unique(ignoreRecord: true),
                Textarea::make('value'),
                Checkbox::make('active'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key'),
                TextColumn::make('value')->limit(35),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
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
            'index' => ListSettings::route('/'),
            'create' => CreateSettings::route('/create'),
            'edit' => EditSettings::route('/{record}/edit'),
        ];
    }
}
