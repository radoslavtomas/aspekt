<?php

namespace App\Filament\Resources\OrderCountries;

use App\Filament\Resources\OrderCountries\Pages\CreateOrderCountry;
use App\Filament\Resources\OrderCountries\Pages\EditOrderCountry;
use App\Filament\Resources\OrderCountries\Pages\ListOrderCountries;
use App\Filament\Resources\OrderCountries\Schemas\OrderCountryForm;
use App\Filament\Resources\OrderCountries\Tables\OrderCountriesTable;
use App\Models\OrderCountry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class OrderCountryResource extends Resource
{
    protected static ?string $model = OrderCountry::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-language';
    protected static string | \UnitEnum | null $navigationGroup = 'Eshop';

    public static function form(Schema $schema): Schema
    {
        return OrderCountryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrderCountriesTable::configure($table);
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
