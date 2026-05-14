<?php

namespace App\Filament\Resources\OrderStatuses;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\OrderStatuses\Pages\ListOrderStatuses;
use App\Filament\Resources\OrderStatuses\Pages\CreateOrderStatus;
use App\Filament\Resources\OrderStatuses\Pages\EditOrderStatus;
use App\Models\OrderStatus;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderStatusResource extends Resource
{
    protected static ?string $model = OrderStatus::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-bolt';

    protected static string | \UnitEnum | null $navigationGroup = 'Eshop';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('status')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('status')
                    ->sortable(),
                TextColumn::make('description')
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
            'index' => ListOrderStatuses::route('/'),
            'create' => CreateOrderStatus::route('/create'),
            'edit' => EditOrderStatus::route('/{record}/edit'),
        ];
    }
}
