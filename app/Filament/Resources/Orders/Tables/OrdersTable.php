<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OrdersTable {

    public static function configure(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i'),
                TextColumn::make('order_total')
                    ->money('EUR', divideBy: 100)
                    ->label('Total'),
                TextColumn::make('delivery_first_name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('delivery_last_name')
                    ->searchable()
                    ->label('Surname'),
                TextColumn::make('primary_email')
                    ->label('email')
                    ->searchable(),
                TextColumn::make('status.description')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Processing' => 'warning',
                        'Canceled' => 'danger',
                        'In checkout' => 'gray'
                    })
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('Processing')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('order_status_id',
                        'processing')),
                Filter::make('Completed')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('order_status_id',
                        'completed')),
                Filter::make('In checkout')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('order_status_id',
                        'in_checkout')),
                Filter::make('Canceled')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('order_status_id', 'canceled')),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

}
