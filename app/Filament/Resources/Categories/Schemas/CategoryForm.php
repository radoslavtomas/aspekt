<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;

class CategoryForm {

    public static function configure(Schema $schema): Schema {
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

}
