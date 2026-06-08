<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class OrderForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->columns(1)
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
                            ->relationship('deliveryCountry',
                                'country_name_sk'),
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

}
