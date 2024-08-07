<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NavigationResource\Pages;
use App\Filament\Resources\NavigationResource\RelationManagers;
use App\Models\Navigation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NavigationResource extends Resource
{
    protected static ?string $model = Navigation::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    protected static ?string $navigationGroup = 'Pages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_sk')
                    ->label('Menu name (SK)')
                    ->required(),
                Forms\Components\TextInput::make('name_en')
                    ->label('Menu name (EN)')
                    ->required(),
                Forms\Components\TextInput::make('component')
                    ->required(),
                Forms\Components\TextInput::make('route')
                    ->required(),
                Forms\Components\TextInput::make('position')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_sk')
                    ->sortable()
                    ->searchable()
                    ->label('Name SK'),
                Tables\Columns\TextColumn::make('name_en')
                    ->sortable()
                    ->searchable()
                    ->label('Name EN'),
                Tables\Columns\TextColumn::make('position')
                    ->sortable()
            ])
            ->defaultSort('position')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListNavigations::route('/'),
            'create' => Pages\CreateNavigation::route('/create'),
            'edit' => Pages\EditNavigation::route('/{record}/edit'),
        ];
    }
}
