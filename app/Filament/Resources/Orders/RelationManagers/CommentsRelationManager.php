<?php

namespace App\Filament\Resources\Orders\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class CommentsRelationManager extends RelationManager
{
    protected static string $relationship = 'comments';

    protected static ?string $recordTitleAttribute = 'comment';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Textarea::make('comment')
                    ->required()
                    ->maxLength(255)
            ])->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('comment'),
                TextColumn::make('order_id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->mutateDataUsing(function (array $data, RelationManager $livewire): array {
                        $data['order_id'] = $livewire->getRelationship()->getParent()->id;

                        return $data;
                    })
            ])
            ->recordActions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->toolbarActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
