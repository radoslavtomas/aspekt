<?php

namespace App\Filament\Resources;

use Closure;
use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Filament\Forms\Components\Repeater;
use FilamentTiptapEditor\TiptapEditor;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Blog settings')
                    ->schema([
                        Forms\Components\Select::make('blog_type_id')
                            ->relationship('blog_type', 'name', fn (Builder $query) => $query->whereIn('id', [5, 6, 43]))
                            ->required(),
                        Forms\Components\Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en'
                            ])
                            ->default('sk')
                            ->disablePlaceholderSelection(),
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Checkbox::make('featured'),
                            Forms\Components\Checkbox::make('published'),
                        ])->columns(1),
                    ]),
                    Fieldset::make('Categories')
                        ->schema([
                            Forms\Components\MultiSelect::make('category')
                                ->relationship('category', 'name')
                        ]),
                    Fieldset::make('Main')
                        ->columns(1)
                        ->schema([
                            Forms\Components\TextInput::make('title')
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function (Closure $set, $state) {
                                    $set('slug', Str::slug($state));
                                }),
                            Forms\Components\TextInput::make('slug')->required(),
                            Forms\Components\TextInput::make('subtitle'),
                            Forms\Components\TextInput::make('authors')
                                ->default(Auth::user()->name),
                            TiptapEditor::make('teaser')
                                ->profile('custom')
                                ->required(),
                            TiptapEditor::make('body')
                                ->profile('custom')
                                ->required(),
                            TiptapEditor::make('links')
                                ->profile('custom'),
                        ]),
                    ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
                Tables\Columns\TextColumn::make('blog_type.name'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('featured')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('aspekt in')
                    ->query(fn (Builder $query): Builder => $query->where('blog_type_id', 5)),
                Filter::make('kniznica')
                    ->query(fn (Builder $query): Builder => $query->where('blog_type_id', 6)),
                Filter::make('njuvinky')
                    ->query(fn (Builder $query): Builder => $query->where('blog_type_id', 43)),
                Filter::make('featured')
                    ->query(fn (Builder $query): Builder => $query->where('featured', true)),
                Filter::make('not published')
                    ->query(fn (Builder $query): Builder => $query->where('published', false))

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType('/public/'.$file);
                        $data['filesize'] = Storage::size('/public/'.$file);
                        $data['filename'] = Str::replace('files/', '', $file);

                        return $data;
                    })
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\FilesRelationManager::class,
            RelationManagers\DownloadsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
