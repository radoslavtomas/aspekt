<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogsTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('publish_at')
                    ->sortable()
                    ->date('d.m.Y H:i'),
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y'),
                TextColumn::make('blog_type.name_sk'),
                TextColumn::make('title')
                    ->limit(30)
                    ->searchable(),
                CheckboxColumn::make('featured')
                    ->sortable(),
                CheckboxColumn::make('home_page')
                    ->sortable(),
                CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('publish_at', 'desc')
            ->filters([
                Filter::make('aspekt in')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('blog_type_id', 5)),
                Filter::make('kniznica')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('blog_type_id', 6)),
                Filter::make('njuvinky')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('blog_type_id', 43)),
                Filter::make('featured')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('featured', TRUE)),
                Filter::make('not published')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('published', FALSE)),

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
