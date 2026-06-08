<?php

namespace App\Filament\Resources\OrderCountries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderCountriesTable {

    public static function configure(Table $table): Table {
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
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

}
