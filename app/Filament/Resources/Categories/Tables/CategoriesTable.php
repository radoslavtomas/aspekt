<?php

namespace App\Filament\Resources\Categories\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class CategoriesTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('name_sk')->sortable()->searchable(),
                TextColumn::make('url')->sortable()->searchable(),
                TextColumn::make('position')->sortable()->searchable(),
                TextColumn::make('navigation.name_sk')
                    ->sortable()
                    ->searchable(),
            ])
            ->defaultSort('navigation.name_sk', 'asc')
            ->filters([
                Filter::make('O Aspekte')
                    ->label('O Aspekte')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('navigation_id', 8)),
                Filter::make('Aspekt In')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('navigation_id', 5)),
                Filter::make('Knižná edícia')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('navigation_id', 4)),
                Filter::make('Knižnica')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('navigation_id', 6)),
                Filter::make('Ňjúvinky')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('navigation_id', 43)),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->after(function() {
                        Cache::forget('navigation');
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

}
