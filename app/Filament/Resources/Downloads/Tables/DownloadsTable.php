<?php

namespace App\Filament\Resources\Downloads\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DownloadsTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('filename')
                    ->limit(30),
                TextColumn::make('filepath')
                    ->limit(40),
                TextColumn::make('filemime')
                    ->limit(20),
                TextColumn::make('filesize'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('Pdfs')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%pdf%')),
                Filter::make('Word docments')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%word%')),
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
