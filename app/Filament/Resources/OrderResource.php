<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-euro';

    protected static ?string $navigationGroup = 'Eshop';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('order_status_id', 'processing')->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Order status')
                    ->schema([
                        Forms\Components\DateTimePicker::make('created_at')
                            ->readOnly(),
                        // Forms\Components\TextInput::make('order_status_id'),
                        Forms\Components\Select::make('order_status_id')
                            ->relationship('status', 'description'),
                        Forms\Components\TextInput::make('order_total')
                            ->label('Total')
                            ->prefixIcon('heroicon-o-currency-euro')
                            ->numeric()
                            ->readOnly(),
                        Forms\Components\TextInput::make('product_count')
                            ->label('Total products')
                            ->disabled(),
                    ]),
                Fieldset::make('Customer')
                    ->schema([
                        Forms\Components\TextInput::make('delivery_first_name')
                            ->label('Name'),
                        Forms\Components\TextInput::make('delivery_last_name')
                            ->label('Surname'),
                        Forms\Components\TextInput::make('primary_email')
                            ->label('Email'),
                        Forms\Components\TextInput::make('delivery_phone')
                            ->label('Email'),
                        Forms\Components\TextInput::make('delivery_street1')
                            ->label('Street'),
                        Forms\Components\TextInput::make('delivery_city')
                            ->label('City'),
                        Forms\Components\TextInput::make('delivery_postal_code')
                            ->label('Postal code'),
                        Forms\Components\Select::make('delivery_country')
                            ->label('Country')
                            ->relationship('deliveryCountry', 'country_name_sk'),
                        Forms\Components\TextInput::make('delivery_company')
                            ->label('Company'),
                    ]),
                Fieldset::make('Customer - Billing details')
                    ->schema([
                        Forms\Components\TextInput::make('billing_first_name')
                            ->label('Name'),
                        Forms\Components\TextInput::make('billing_last_name')
                            ->label('Surname'),
                        Forms\Components\TextInput::make('primary_email')
                            ->label('Email'),
                        Forms\Components\TextInput::make('billing_phone')
                            ->label('Email'),
                        Forms\Components\TextInput::make('billing_street1')
                            ->label('Street'),
                        Forms\Components\TextInput::make('billing_city')
                            ->label('City'),
                        Forms\Components\TextInput::make('billing_postal_code')
                            ->label('Postal code'),
                        Forms\Components\Select::make('billing_country')
                            ->label('Country')
                            ->relationship('billingCountry', 'country_name_sk'),
                        Forms\Components\TextInput::make('billing_company')
                            ->label('Company'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i'),
                Tables\Columns\TextColumn::make('order_total')
                    ->money('EUR', divideBy: 100)
                    ->label('Total'),
                Tables\Columns\TextColumn::make('delivery_first_name')
                    ->searchable()
                    ->label('Name'),
                Tables\Columns\TextColumn::make('delivery_last_name')
                    ->searchable()
                    ->label('Surname'),
                Tables\Columns\TextColumn::make('primary_email')
                    ->label('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status.description')
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
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ItemsRelationManager::class,
            RelationManagers\CommentsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }
}
