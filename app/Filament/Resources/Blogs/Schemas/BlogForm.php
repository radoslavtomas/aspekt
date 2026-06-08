<?php

namespace App\Filament\Resources\Blogs\Schemas;

use App\Filament\Concerns\HasRichContentToolbar;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogForm {

    use HasRichContentToolbar;

    public static function configure(Schema $schema): Schema {
        return $schema
            ->columns(1)
            ->components([
                Fieldset::make('Blog settings')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('blog_type_id')
                            ->relationship('blog_type', 'name_sk',
                                fn(Builder $query) => $query->whereIn('id',
                                    [5, 6, 43]))
                            ->required(),
                        Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en',
                            ])
                            ->default('sk')
                            ->required(),
                        Grid::make()
                            ->schema([
                                Checkbox::make('featured'),
                                Checkbox::make('home_page'),
                                Checkbox::make('published')
                                    ->live()
                                    ->afterStateUpdated(function(
                                        Get $get,
                                        Set $set,
                                        ?string $old,
                                        ?bool $state
                                    ) {
                                        if ($state) {
                                            $set('publish_at', Carbon::now()
                                                ->toDateTimeString());
                                        }
                                        else {
                                            $set('publish_at', NULL);
                                        }
                                    }),
                            ]),
                        DateTimePicker::make('publish_at')
                            ->hidden(fn(Get $get
                            ): bool => !$get('published')),
                    ]),
                Fieldset::make('Categories')
                    ->columns(1)
                    ->columnSpanFull()
                    ->schema([
                        Select::make('category')
                            ->multiple()
                            ->relationship('category', 'name_sk')
                            ->preload(),
                    ]),
                Fieldset::make('Main')
                    ->columns(1)
                    ->columnSpanFull()
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->live(onBlur: TRUE)
                            ->afterStateUpdated(function(
                                Get $get,
                                Set $set,
                                ?string $old,
                                ?string $state
                            ) {
                                if (Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: TRUE)
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
                            ->textColors([
                                '#e7000b' => 'Aspekt Red',
                                '#000000' => 'Black',
                                '#333333' => 'Dark gray',
                                '#666666' => 'Gray',
                                '#999999' => 'Light gray',
                                '#cccccc' => 'Lighter gray',
                                '#ffffff' => 'White',
                                '#ff0000' => 'Red',
                                '#ff9900' => 'Orange',
                                '#ffff00' => 'Yellow',
                                '#00ff00' => 'Green',
                                '#00ffff' => 'Cyan',
                                '#0000ff' => 'Blue',
                                '#9900ff' => 'Purple',
                            ])
                            ->required(),
                        RichEditor::make('links')
                            ->toolbarButtons(self::richContentToolbar())
                            ->plugins(self::richContentPlugins()),
                        FileUpload::make('feature_img')
                            ->image()
                            ->getUploadedFileNameForStorageUsing(
                                function(TemporaryUploadedFile $file
                                ): string {
                                    $filename = explode('.',
                                        $file->getClientOriginalName())[0];
                                    return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                },
                            )
                            ->directory('featured_images')
                            ->label('Featured image')
                            ->automaticallyResizeImagesMode('contain')
                            ->automaticallyResizeImagesToWidth('1200')
                            ->automaticallyUpscaleImagesWhenResizing(FALSE),
                    ]),
            ]);
    }

}
