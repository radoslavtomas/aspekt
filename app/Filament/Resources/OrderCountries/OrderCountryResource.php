<?php

namespace App\Filament\Resources\OrderCountries;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\OrderCountries\Pages\ListOrderCountries;
use App\Filament\Resources\OrderCountries\Pages\CreateOrderCountry;
use App\Filament\Resources\OrderCountries\Pages\EditOrderCountry;
use App\Models\OrderCountry;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderCountryResource extends Resource
{
    protected static ?string $model = OrderCountry::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-language';
    protected static string | \UnitEnum | null $navigationGroup = 'Eshop';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('country_name_sk')
                    ->label('Country SK'),
                TextInput::make('country_name_en')
                    ->label('Country EN'),
                TextInput::make('country_iso_code_2')
                    ->label('Country ISO 2'),
                TextInput::make('country_iso_code_3')
                    ->label('Country ISO 3'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country_name_sk')
                    ->searchable()
                    ->label('Country'),
                TextColumn::make('country_iso_code_3')
                    ->searchable()
                    ->label('Country ISO'),
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
            'index' => ListOrderCountries::route('/'),
            'create' => CreateOrderCountry::route('/create'),
            'edit' => EditOrderCountry::route('/{record}/edit'),
        ];
    }
}
