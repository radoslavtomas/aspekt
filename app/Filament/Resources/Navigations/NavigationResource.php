<?php

namespace App\Filament\Resources\Navigations;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Navigations\Pages\ListNavigations;
use App\Filament\Resources\Navigations\Pages\CreateNavigation;
use App\Filament\Resources\Navigations\Pages\EditNavigation;
use App\Models\Navigation;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-paper-clip';

    protected static string | \UnitEnum | null $navigationGroup = 'Pages';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_sk')
                    ->label('Menu name (SK)')
                    ->required(),
                TextInput::make('name_en')
                    ->label('Menu name (EN)')
                    ->required(),
                TextInput::make('component')
                    ->required(),
                TextInput::make('route')
                    ->required(),
                TextInput::make('position')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name_sk')
                    ->sortable()
                    ->searchable()
                    ->label('Name SK'),
                TextColumn::make('name_en')
                    ->sortable()
                    ->searchable()
                    ->label('Name EN'),
                TextColumn::make('position')
                    ->sortable()
            ])
            ->defaultSort('position')
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
            'index' => ListNavigations::route('/'),
            'create' => CreateNavigation::route('/create'),
            'edit' => EditNavigation::route('/{record}/edit'),
        ];
    }
}
