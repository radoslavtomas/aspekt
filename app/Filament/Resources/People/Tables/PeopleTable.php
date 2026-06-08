<?php

namespace App\Filament\Resources\People\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class PeopleTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
                ImageColumn::make('avatar'),
                TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                SelectColumn::make('type_id')
                    ->options([
                        '0' => 'Autorky',
                        '1' => 'Kto je kto',
                    ]),
                CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'asc')
            ->filters([
                Filter::make('Autorky')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('type_id', 0)),
                Filter::make('Kto je kto')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('type_id', 1)),
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
