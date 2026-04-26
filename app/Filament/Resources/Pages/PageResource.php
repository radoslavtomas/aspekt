<?php

namespace App\Filament\Resources\Pages;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Pages\Pages\ListPages;
use App\Filament\Resources\Pages\Pages\CreatePage;
use App\Filament\Resources\Pages\Pages\EditPage;
use App\Models\Page;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static string | \UnitEnum | null $navigationGroup = 'Pages';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name_sk')
                    ->required(),
                TextInput::make('name_en')
                    ->required(),
                Grid::make()->schema([
                    RichEditor::make('body_sk')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike'],
                            ['h1', 'h2', 'h3'],
                            ['alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList'],
                            ['table', 'link', 'attachFiles'],
                            ['undo', 'redo'],
                        ])
                        ->required(),
                    RichEditor::make('body_en')
                        ->toolbarButtons([
                            ['bold', 'italic', 'underline', 'strike'],
                            ['h1', 'h2', 'h3'],
                            ['alignStart', 'alignCenter', 'alignEnd'],
                            ['blockquote', 'bulletList', 'orderedList'],
                            ['table', 'link', 'attachFiles'],
                            ['undo', 'redo'],
                        ])
                        ->required(),
                ])
                ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
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
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPages::route('/'),
            'create' => CreatePage::route('/create'),
            'edit' => EditPage::route('/{record}/edit'),
        ];
    }
}
