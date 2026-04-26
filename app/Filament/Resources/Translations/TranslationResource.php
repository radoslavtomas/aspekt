<?php

namespace App\Filament\Resources\Translations;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Translations\Pages\ListTranslations;
use App\Filament\Resources\Translations\Pages\CreateTranslation;
use App\Filament\Resources\Translations\Pages\EditTranslation;
use App\Models\Translation;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TranslationResource extends Resource
{
    protected static ?string $model = Translation::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-language';

    protected static string | \UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')->unique(ignoreRecord: true),
                Textarea::make('sk'),
                Textarea::make('en'),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->searchable(),
                TextColumn::make('sk')
                    ->label('SK')
                    ->limit(35)
                    ->searchable(),
                TextColumn::make('en')->label('EN')->limit(35)
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
            'index' => ListTranslations::route('/'),
            'create' => CreateTranslation::route('/create'),
            'edit' => EditTranslation::route('/{record}/edit'),
        ];
    }
}
