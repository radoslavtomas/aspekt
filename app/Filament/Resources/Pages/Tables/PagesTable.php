<?php

namespace App\Filament\Resources\Pages\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PagesTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name_sk')
                    ->limit(50)
                    ->sortable()
                    ->searchable()
                    ->label('Name SK'),
                TextColumn::make('name_en')
                    ->limit(50)
                    ->sortable()
                    ->searchable()
                    ->label('Name EN'),
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
