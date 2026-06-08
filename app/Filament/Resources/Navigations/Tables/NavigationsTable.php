<?php

namespace App\Filament\Resources\Navigations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NavigationsTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('name_sk')
                    ->sortable()
                    ->searchable()
                    ->label('Name SK'),
                TextColumn::make('name_en')
                    ->sortable()
                    ->searchable()
                    ->label('Name EN'),
                TextColumn::make('position')
                    ->sortable()
            ])
            ->defaultSort('position')
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
