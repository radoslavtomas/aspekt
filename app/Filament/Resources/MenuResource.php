<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name_sk')
                    ->label('Menu name (SK)')
                    ->required(),
                Forms\Components\TextInput::make('name_en')
                    ->label('Menu name (EN)')
                    ->required(),
                Forms\Components\Grid::make()->schema([
                    Repeater::make('menu_items')
                        ->schema([
                            Forms\Components\Grid::make()->schema([
                                Forms\Components\TextInput::make('name_sk')
                                    ->required()
                                    ->label('Menu item name (SK)')
                                    ->columnSpan([
                                        'md' => 5
                                    ]),
                                Forms\Components\TextInput::make('name_en')
                                    ->required()
                                    ->label('Menu item name (EN)')
                                    ->columnSpan([
                                        'md' => 5
                                    ]),
                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->numeric()
                                    ->columnSpan([
                                        'md' => 2
                                    ])
                            ])
                                ->columns(12),
                            Forms\Components\Checkbox::make('is_dynamic')
                                ->label('Static content')
                                ->reactive()
                                ->default(true)
                                ->helperText('Static content requires related page, dynamic content requires category.')
                                ->required(),
                            Forms\Components\Select::make('category_id')
                                ->label('Category')
                                ->options(Category::all()->pluck('name', 'id'))
                                ->searchable()
                                ->hidden(fn (Closure $get) => $get('is_dynamic')),
                            Forms\Components\Select::make('page_id')
                                ->label('Page')
                                ->options(Page::all()->sortBy('name')->pluck('name_sk', 'id'))
                                ->searchable()
                                ->hidden(fn (Closure $get) => !$get('is_dynamic')),
                        ])
                        ->columns(1)
                ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name_sk')
                    ->sortable()
                    ->searchable()
                    ->label('Name SK'),
                Tables\Columns\TextColumn::make('name_en')
                    ->sortable()
                    ->searchable()
                    ->label('Name EN'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}
