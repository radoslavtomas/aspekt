<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderCountryResource\Pages;
use App\Filament\Resources\OrderCountryResource\RelationManagers;
use App\Models\OrderCountry;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderCountryResource extends Resource
{
    protected static ?string $model = OrderCountry::class;

    protected static ?string $navigationIcon = 'heroicon-o-translate';
    protected static ?string $navigationGroup = 'Eshop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country_name_sk')
                    ->label('Country SK'),
                Forms\Components\TextInput::make('country_name_en')
                    ->label('Country EN'),
                Forms\Components\TextInput::make('country_iso_code_2')
                    ->label('Country ISO 2'),
                Forms\Components\TextInput::make('country_iso_code_3')
                    ->label('Country ISO 3'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country_name_sk')
                    ->searchable()
                    ->label('Country'),
                Tables\Columns\TextColumn::make('country_iso_code_3')
                    ->searchable()
                    ->label('Country ISO'),
            ])
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
            'index' => Pages\ListOrderCountries::route('/'),
            'create' => Pages\CreateOrderCountry::route('/create'),
            'edit' => Pages\EditOrderCountry::route('/{record}/edit'),
        ];
    }
}
