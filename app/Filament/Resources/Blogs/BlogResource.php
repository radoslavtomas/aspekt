<?php

namespace App\Filament\Resources\Blogs;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Blogs\RelationManagers\FilesRelationManager;
use App\Filament\Resources\Blogs\RelationManagers\DownloadsRelationManager;
use App\Filament\Concerns\HasRichContentToolbar;
use App\Filament\Resources\Blogs\Pages\ListBlogs;
use App\Filament\Resources\Blogs\Pages\CreateBlog;
use App\Filament\Resources\Blogs\Pages\EditBlog;
use App\Models\Blog;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogResource extends Resource
{
    use HasRichContentToolbar;

    protected static ?string $model = Blog::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-folder-open';
    protected static string | \UnitEnum | null $navigationGroup = 'Content';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                    Fieldset::make('Blog settings')
                        ->schema([
                            Select::make('blog_type_id')
                                ->relationship('blog_type', 'name_sk',
                                    fn(Builder $query) => $query->whereIn('id', [5, 6, 43]))
                                ->required(),
                            Select::make('language')
                                ->options([
                                    'sk' => 'sk',
                                    'en' => 'en'
                                ])
                                ->default('sk')
                                ->required(),
                            Grid::make()->schema([
                                Checkbox::make('featured'),
                                Checkbox::make('home_page'),
                                Checkbox::make('published')
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?bool $state) {
                                        if ($state) {
                                            $set('publish_at', Carbon::now()->toDateTimeString());
                                        } else {
                                            $set('publish_at', null);
                                        }
                                    }),
                                DateTimePicker::make('publish_at')
                                    ->hidden(fn(Get $get): bool => !$get('published'))
                            ])->columns(1),
                        ]),
                    Fieldset::make('Categories')
                        ->schema([
                            Select::make('category')
                                ->multiple()
                                ->relationship('category', 'name_sk')
                                ->preload()
                        ]),
                    Fieldset::make('Main')
                        ->columns(1)
                        ->schema([
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
                            TextInput::make('authors')
                                ->default(Auth::user()->name),
                            TextInput::make('authors_cite')
                                ->label('Authors citation'),
                            Hidden::make('user_id')
                                ->default(Auth::id()),
                            RichEditor::make('teaser')
                                ->toolbarButtons(self::richContentToolbar())
                                ->plugins(self::richContentPlugins())
                                ->required(),
                            RichEditor::make('body')
                                ->toolbarButtons(self::richContentToolbar())
                                ->plugins(self::richContentPlugins())
                                ->required(),
                            RichEditor::make('links')
                                ->toolbarButtons(self::richContentToolbar())
                                ->plugins(self::richContentPlugins()),
                            FileUpload::make('feature_img')
                                ->image()
                                ->getUploadedFileNameForStorageUsing(
                                    function (TemporaryUploadedFile $file): string {
                                        $filename = explode('.', $file->getClientOriginalName())[0];
                                        return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                    },
                                )
                                ->directory('featured_images')
                                ->label('Featured image')
                                ->imageResizeMode('contain')
                                ->imageResizeTargetWidth('1200')
                                ->imageResizeUpscale(false),
                        ]),
                ]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y'),
                TextColumn::make('blog_type.name_sk'),
                TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                CheckboxColumn::make('featured')
                    ->sortable(),
                CheckboxColumn::make('home_page')
                    ->sortable(),
                IconColumn::make('published')
                    ->icon(fn(string $state): string => match ($state) {
                        '0' => 'heroicon-o-x-circle',
                        '1' => 'heroicon-o-check-circle',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        '0' => 'danger',
                        '1' => 'success',
                    })
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('aspekt in')
                    ->query(fn(Builder $query): Builder => $query->where('blog_type_id', 5)),
                Filter::make('kniznica')
                    ->query(fn(Builder $query): Builder => $query->where('blog_type_id', 6)),
                Filter::make('njuvinky')
                    ->query(fn(Builder $query): Builder => $query->where('blog_type_id', 43)),
                Filter::make('featured')
                    ->query(fn(Builder $query): Builder => $query->where('featured', true)),
                Filter::make('not published')
                    ->query(fn(Builder $query): Builder => $query->where('published', false))

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
                    })
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
            'index' => ListBlogs::route('/'),
            'create' => CreateBlog::route('/create'),
            'edit' => EditBlog::route('/{record}/edit'),
        ];
    }
}
