<?php

namespace App\Filament\Resources\Books;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Books\RelationManagers\FilesRelationManager;
use App\Filament\Resources\Books\RelationManagers\DownloadsRelationManager;
use App\Filament\Concerns\HasRichContentToolbar;
use App\Filament\Resources\Books\Pages\ListBooks;
use App\Filament\Resources\Books\Pages\CreateBook;
use App\Filament\Resources\Books\Pages\EditBook;
use App\Models\Book;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BookResource extends Resource
{
    use HasRichContentToolbar;

    protected static ?string $model = Book::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-book-open';

    protected static string | \UnitEnum | null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Fieldset::make('Quick settings')
                    ->schema([
//                        Forms\Components\Select::make('blog_type_id')
//                            ->relationship('blog_type', 'name', fn (Builder $query) => $query->whereIn('id', [5, 6, 43]))
//                            ->required(),
                        Checkbox::make('is_product'),
                        Checkbox::make('is_ebook'),
                        Checkbox::make('home_page'),
                        Checkbox::make('published'),
                    ])
                    ->columns(4),
                Fieldset::make('Book settings')
                    ->schema([
                        Select::make('name_sk')
                            ->multiple()
                            ->preload()
                            ->relationship('category', 'name_sk',
                                fn(Builder $query) => $query->where('navigation_id', 4))
                            ->required(),
                        FileUpload::make('cover')
                            ->getUploadedFileNameForStorageUsing(
                                function (TemporaryUploadedFile $file): string {
                                    $filename = explode('.', $file->getClientOriginalName())[0];
                                    return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                },
                            )
                            ->directory('covers')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeUpscale(false),
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('subtitle'),
                        TextInput::make('authors'),
                        TextInput::make('editors'),
                        TextInput::make('translation'),
                        RichEditor::make('teaser')
                            ->toolbarButtons(self::richContentToolbar())
                            ->required(),
                        RichEditor::make('body')
                            ->toolbarButtons(self::richContentToolbar())
                            ->required(),
                        RichEditor::make('sample')
                            ->toolbarButtons(self::richContentToolbar()),
                        RichEditor::make('links')
                            ->toolbarButtons(self::richContentToolbar()),
                        Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en'
                            ])
                            ->default('sk')
                            ->required(),
                    ])
                    ->columns(1),
                Fieldset::make('Product settings')
                    ->schema([
                        TextInput::make('common_price')
                            ->label('Common price (€)')
                            ->numeric(),
                        TextInput::make('aspekt_price')
                            ->label('Aspekt price (€)')
                            ->numeric(),
                        TextInput::make('pages')
                            ->numeric(),
                        TextInput::make('isbn')
                            ->label('ISBN'),
                    ]),
                Fieldset::make('Eshop settings')
                    ->schema([
                        Repeater::make('eshop_links')
                            ->schema([
                                TextInput::make('eshop_name'),
                                TextInput::make('link'),
                            ])->columns(2)
                    ])->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y'),
                TextColumn::make('title')
                    ->limit(50)
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('featured')
                    ->query(fn(Builder $query): Builder => $query->where('featured', true)),
                Filter::make('not published')
                    ->query(fn(Builder $query): Builder => $query->where('published', false)),
                Filter::make('product')
                    ->query(fn(Builder $query): Builder => $query->where('is_product', true)),
                Filter::make('ebook')
                    ->query(fn(Builder $query): Builder => $query->where('is_ebook', true))
            ])
            ->recordActions([
                EditAction::make()
                    ->mutateRecordDataUsing(function (array $data): array {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType('/public/'.$file);
                        $data['filesize'] = Storage::size('/public/'.$file);
                        $data['filename'] = Str::replace('files/', '', $file);

                        return $data;
                    }),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            FilesRelationManager::class,
            DownloadsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBooks::route('/'),
            'create' => CreateBook::route('/create'),
            'edit' => EditBook::route('/{record}/edit'),
        ];
    }
}
