<?php

namespace App\Filament\Resources\Books\Schemas;

use App\Filament\Concerns\HasRichContentToolbar;
use Carbon\Carbon;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BookForm {

    use HasRichContentToolbar;

    public static function configure(Schema $schema): Schema {
        return $schema
            ->columns(1)
            ->components([
                Fieldset::make('Quick settings')
                    ->columns(2)
                    ->schema([
                        //                        Forms\Components\Select::make('blog_type_id')
                        //                            ->relationship('blog_type', 'name', fn (Builder $query) => $query->whereIn('id', [5, 6, 43]))
                        //                            ->required(),
                        Grid::make()
                            ->schema([
                                Checkbox::make('is_product'),
                                Checkbox::make('is_ebook'),
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
                                            $set('published_at', Carbon::now()
                                                ->toDateTimeString());
                                        }
                                        else {
                                            $set('published_at', NULL);
                                        }
                                    }),
                            ]),
                        DateTimePicker::make('published_at')
                            ->hidden(fn(Get $get
                            ): bool => !$get('published')),
                    ]),
                Fieldset::make('Book settings')
                    ->schema([
                        Select::make('name_sk')
                            ->multiple()
                            ->preload()
                            ->relationship('category', 'name_sk',
                                fn(Builder $query
                                ) => $query->where('navigation_id', 4))
                            ->required(),
                        FileUpload::make('cover')
                            ->getUploadedFileNameForStorageUsing(
                                function(TemporaryUploadedFile $file): string {
                                    $filename = explode('.',
                                        $file->getClientOriginalName())[0];
                                    return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                },
                            )
                            ->directory('covers')
                            ->automaticallyResizeImagesMode('contain')
                            ->automaticallyResizeImagesToWidth('1200')
                            ->automaticallyUpscaleImagesWhenResizing(FALSE),
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
                        TextInput::make('authors'),
                        TextInput::make('editors'),
                        TextInput::make('translation'),
                        RichEditor::make('teaser')
                            ->toolbarButtons(self::richContentToolbar())
                            ->plugins(self::richContentPlugins())
                            ->required(),
                        RichEditor::make('body')
                            ->toolbarButtons(self::richContentToolbar())
                            ->plugins(self::richContentPlugins())
                            ->required(),
                        RichEditor::make('sample')
                            ->toolbarButtons(self::richContentToolbar())
                            ->plugins(self::richContentPlugins()),
                        RichEditor::make('links')
                            ->toolbarButtons(self::richContentToolbar())
                            ->plugins(self::richContentPlugins()),
                        Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en',
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
                            ])->columns(2),
                    ])->columns(1),
            ]);
    }

}
