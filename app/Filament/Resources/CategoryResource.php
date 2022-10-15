<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_sk')->required(),
                Forms\Components\TextInput::make('name_en')->required(),
                Forms\Components\TextInput::make('url')->required(),
                Forms\Components\TextInput::make('position')->required(),
                Forms\Components\Grid::make()
                    ->schema([
                        Forms\Components\Checkbox::make('is_dynamic'),
                        Placeholder::make('Dynamic vs Static')
                            ->content('If content that belongs to category is dynamic (e.g. blog posts, list of books) check "Is dynamic" box. If your content is static (e.g. pages like "Contact", "Projects") make sure to uncheck "Is dynamic" box and select page belonging to category.')
                    ])
                    ->columns(1),
                Forms\Components\Select::make('navigation_id')
                    ->relationship('navigation', 'name_sk', fn (Builder $query) => $query->whereIn('id', [4, 5, 6, 8, 10]))
                    ->required(),
                Forms\Components\Select::make('page_id')
                    ->relationship('page', 'name_sk')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_sk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('url')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('position')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('navigation.name_sk')->sortable()->searchable(),
            ])
            ->defaultSort('navigation.name_sk', 'asc')
            ->filters([
                Filter::make('AspektIn')
                    ->query(fn (Builder $query): Builder => $query->where('navigation_id', 5)),
                Filter::make('Knižná edícia')
                    ->query(fn (Builder $query): Builder => $query->where('navigation_id', 4)),
                Filter::make('Knižnica')
                    ->query(fn (Builder $query): Builder => $query->where('navigation_id', 6)),
                Filter::make('Ňjúvinky')
                    ->query(fn (Builder $query): Builder => $query->where('navigation_id', 10)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
