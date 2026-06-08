<?php

namespace App\Filament\Resources\Files\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class FilesTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('filename')
                    ->limit(30),
                TextColumn::make('filepath')
                    ->label('Preview')
                    ->formatStateUsing(function($state, $record) {
                        if (str_starts_with($record->filemime, 'image/')) {
                            return '<img src="'.Storage::url($state).'" alt="preview" style="max-width: 50px; height: auto;">';
                        }
                        else {
                            return '<span class="text-sm text-gray-500">No preview</span>';
                        }
                    })
                    ->html(),
                TextColumn::make('filemime')
                    ->limit(20),
                TextColumn::make('filesize')
                    ->formatStateUsing(fn(string $state
                    ): string => (formatFileSizeUnits($state))),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('Images')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%image%')),
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
