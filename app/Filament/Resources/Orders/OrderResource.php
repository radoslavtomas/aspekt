<?php

namespace App\Filament\Resources\Orders;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use App\Filament\Resources\Orders\RelationManagers\ItemsRelationManager;
use App\Filament\Resources\Orders\RelationManagers\CommentsRelationManager;
use App\Filament\Resources\Orders\Pages\ListOrders;
use App\Filament\Resources\Orders\Pages\CreateOrder;
use App\Filament\Resources\Orders\Pages\EditOrder;
use App\Models\Order;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-currency-euro';

    protected static string | \UnitEnum | null $navigationGroup = 'Eshop';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('order_status_id', 'processing')->count();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Order status')
                    ->schema([
                        DateTimePicker::make('created_at')
                            ->readOnly(),
                        // Forms\Components\TextInput::make('order_status_id'),
                        Select::make('order_status_id')
                            ->relationship('status', 'description'),
                        TextInput::make('order_total')
                            ->label('Total')
                            ->prefixIcon('heroicon-o-currency-euro')
                            ->numeric()
                            ->readOnly(),
                        TextInput::make('postage')
                            ->label('Postage')
                            ->prefixIcon('heroicon-o-currency-euro')
                            ->numeric(),
                        TextInput::make('product_count')
                            ->label('Total products')
                            ->disabled(),
                    ]),
                Fieldset::make('Customer')
                    ->schema([
                        TextInput::make('delivery_first_name')
                            ->label('Name'),
                        TextInput::make('delivery_last_name')
                            ->label('Surname'),
                        TextInput::make('primary_email')
                            ->label('Email'),
                        TextInput::make('delivery_phone')
                            ->label('Email'),
                        TextInput::make('delivery_street1')
                            ->label('Street'),
                        TextInput::make('delivery_city')
                            ->label('City'),
                        TextInput::make('delivery_postal_code')
                            ->label('Postal code'),
                        Select::make('delivery_country')
                            ->label('Country')
                            ->relationship('deliveryCountry', 'country_name_sk'),
                        TextInput::make('delivery_company')
                            ->label('Company'),
                    ]),
                Fieldset::make('Customer - Billing details')
                    ->schema([
                        TextInput::make('billing_first_name')
                            ->label('Name'),
                        TextInput::make('billing_last_name')
                            ->label('Surname'),
                        TextInput::make('primary_email')
                            ->label('Email'),
                        TextInput::make('billing_phone')
                            ->label('Email'),
                        TextInput::make('billing_street1')
                            ->label('Street'),
                        TextInput::make('billing_city')
                            ->label('City'),
                        TextInput::make('billing_postal_code')
                            ->label('Postal code'),
                        Select::make('billing_country')
                            ->label('Country')
                            ->relationship('billingCountry', 'country_name_sk'),
                        TextInput::make('billing_company')
                            ->label('Company'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i'),
                TextColumn::make('order_total')
                    ->money('EUR', divideBy: 100)
                    ->label('Total'),
                TextColumn::make('delivery_first_name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('delivery_last_name')
                    ->searchable()
                    ->label('Surname'),
                TextColumn::make('primary_email')
                    ->label('email')
                    ->searchable(),
                TextColumn::make('status.description')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Processing' => 'warning',
                        'Canceled' => 'danger',
                        'In checkout' => 'gray'
                    })
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('Processing')
                    ->query(fn(Builder $query): Builder => $query->where('order_status_id', 'processing')),
                Filter::make('Completed')
                    ->query(fn(Builder $query): Builder => $query->where('order_status_id', 'completed')),
                Filter::make('In checkout')
                    ->query(fn(Builder $query): Builder => $query->where('order_status_id', 'in_checkout')),
                Filter::make('Canceled')
                    ->query(fn(Builder $query): Builder => $query->where('order_status_id', 'canceled')),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ItemsRelationManager::class,
            CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrders::route('/'),
            'create' => CreateOrder::route('/create'),
            'edit' => EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
