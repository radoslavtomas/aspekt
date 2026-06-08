<?php

namespace App\Filament\Resources\People\Schemas;

use App\Filament\Concerns\HasRichContentToolbar;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PeopleForm {

    use HasRichContentToolbar;

    public static function configure(Schema $schema): Schema {
        return $schema
            ->columns(1)
            ->components([
                Fieldset::make('Quick settings')
                    ->schema([
                        Select::make('type_id')
                            ->options([
                                '0' => 'Autorky',
                                '1' => 'Kto je kto',
                            ]),
                        DatePicker::make('created_at'),
                        Checkbox::make('published'),
                    ])
                    ->columns(3),
                Fieldset::make('Person details')
                    ->schema([
                        FileUpload::make('avatar')
                            ->getUploadedFileNameForStorageUsing(
                                function(TemporaryUploadedFile $file): string {
                                    $filename = explode('.',
                                        $file->getClientOriginalName())[0];
                                    return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                },
                            )
                            ->directory('avatars')
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
                        Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en',
                            ])
                            ->default('sk')
                            ->disablePlaceholderSelection(),
                    ])
                    ->columns(1),
            ]);
    }

}
