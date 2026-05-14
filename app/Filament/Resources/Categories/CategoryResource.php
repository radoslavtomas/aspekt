<?php

namespace App\Filament\Resources\Categories;

use App\Filament\Resources\Categories\Pages\CreateCategory;
use App\Filament\Resources\Categories\Pages\EditCategory;
use App\Filament\Resources\Categories\Pages\ListCategories;
use App\Models\Category;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Cache;

class CategoryResource extends Resource {

    protected static ?string $model = Category::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-bookmark';

    protected static string|\UnitEnum|null $navigationGroup = 'Pages';

    public static function form(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name_sk')->required(),
                TextInput::make('name_en')->required(),
                TextInput::make('url')->required(),
                TextInput::make('position')->required(),
                Grid::make()
                    ->schema([
                        Checkbox::make('is_dynamic'),
                        TextEntry::make('Dynamic vs Static')
                            ->state('If content that belongs to category is dynamic (e.g. blog posts, list of books) check "Is dynamic" box. If your content is static (e.g. pages like "Contact", "Projects") make sure to uncheck "Is dynamic" box and select page belonging to category.'),
                    ])
                    ->columnSpan(2)
                    ->columns(1),
                Select::make('navigation_id')
                    ->relationship('navigation', 'name_sk',
                        fn(Builder $query) => $query->whereIn('id',
                            [4, 5, 6, 8, 43]))
                    ->required(),
                Select::make('page_id')
                    ->relationship('page', 'name_sk'),
            ]);
    }

    public static function table(Table $table): Table {
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
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit' => EditCategory::route('/{record}/edit'),
        ];
    }

}
