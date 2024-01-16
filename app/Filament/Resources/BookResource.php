<?php

namespace App\Filament\Resources;

use Closure;
use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use FilamentTiptapEditor\TiptapEditor;
use FilamentTiptapEditor\Enums\TiptapOutput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Quick settings')
                    ->schema([
//                        Forms\Components\Select::make('blog_type_id')
//                            ->relationship('blog_type', 'name', fn (Builder $query) => $query->whereIn('id', [5, 6, 43]))
//                            ->required(),
                        Forms\Components\Checkbox::make('is_product'),
                        Forms\Components\Checkbox::make('featured'),
                        Forms\Components\Checkbox::make('published'),
                    ])
                    ->columns(3),
                Fieldset::make('Book settings')
                    ->schema([
                        Forms\Components\Select::make('name_sk')
                            ->multiple()
                            ->preload()
                            ->relationship('category', 'name_sk', fn (Builder $query) => $query->where('navigation_id', 4))
                            ->required(),
                        Forms\Components\FileUpload::make('cover')
                            ->preserveFilenames()
                            ->directory('covers'),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(function (\Filament\Forms\Set $set, $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\TextInput::make('subtitle'),
                        Forms\Components\TextInput::make('authors'),
                        Forms\Components\TextInput::make('editors'),
                        Forms\Components\TextInput::make('translation'),
                        TiptapEditor::make('teaser')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('body')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('sample')
                            ->profile('custom'),
                        TiptapEditor::make('links')
                            ->profile('custom')
                            ->output(TiptapOutput::Html),
                        Forms\Components\Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en'
                            ])
                            ->default('sk')
                            ->disablePlaceholderSelection(),
                    ])
                ->columns(1),
                Fieldset::make('Product settings')
                    ->schema([
                        Forms\Components\TextInput::make('common_price')
                            ->label('Common price (€)'),
                        Forms\Components\TextInput::make('aspekt_price')
                            ->label('Aspekt price (€)'),
                        Forms\Components\TextInput::make('pages'),
                        Forms\Components\TextInput::make('isbn')
                            ->label('ISBN'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover'),
                Tables\Columns\CheckboxColumn::make('featured')
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('is_product')
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
                    }),
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
