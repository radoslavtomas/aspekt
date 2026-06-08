<?php

namespace App\Filament\Resources\Books\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BooksTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('published_at')
                    ->sortable()
                    ->date('d.m.Y H:i'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->limit(20)
                    ->date('d.m.Y'),
                TextColumn::make('title')
                    ->limit(25)
                    ->searchable(),
                ImageColumn::make('cover'),
                CheckboxColumn::make('home_page')
                    ->sortable(),
                CheckboxColumn::make('is_product')
                    ->sortable(),
                CheckboxColumn::make('is_ebook')
                    ->sortable(),
                CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([
                Filter::make('featured')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('featured', TRUE)),
                Filter::make('not published')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('published', FALSE)),
                Filter::make('product')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('is_product', TRUE)),
                Filter::make('ebook')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('is_ebook', TRUE)),
            ])
            ->recordActions([
                EditAction::make()
                    ->mutateRecordDataUsing(function(array $data): array {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType('/public/'.$file);
                        $data['filesize'] = Storage::size('/public/'.$file);
                        $data['filename'] = Str::replace('files/', '', $file);

                        return $data;
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

}
