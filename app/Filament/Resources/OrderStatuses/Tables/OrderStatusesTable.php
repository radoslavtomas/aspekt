<?php

namespace App\Filament\Resources\OrderStatuses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrderStatusesTable {

    public static function configure(Table $table): Table {
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
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

}
