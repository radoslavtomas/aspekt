<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Filament\Concerns\HasRichContentToolbar;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class EventForm {

    use HasRichContentToolbar;

    public static function configure(Schema $schema): Schema {
        return $schema
            ->columns(1)
            ->components([
                Fieldset::make('Main')
                    ->columns(1)
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
                        DatePicker::make('date_start'),
                        TimePicker::make('time_start'),
                        DatePicker::make('date_end'),
                        TimePicker::make('time_end'),
                        TextInput::make('place'),
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
                                function(TemporaryUploadedFile $file): string {
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
                Fieldset::make('Event settings')
                    ->columns(1)
                    ->schema([
                        Hidden::make('user_id')
                            ->default(Auth::id()),
                        Grid::make()->schema([
                            Checkbox::make('published'),
                            Checkbox::make('featured'),
                            Checkbox::make('home_page'),
                        ])->columns(1),
                        Grid::make()->schema([
                            Select::make('language')
                                ->options([
                                    'sk' => 'sk',
                                    'en' => 'en',
                                ])
                                ->default('sk')
                                ->required(),
                        ]),
                    ]),
            ]);
    }

}
