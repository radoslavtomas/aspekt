<?php

namespace App\Filament\Resources\People;

use App\Filament\Concerns\HasRichContentToolbar;
use App\Filament\Resources\People\Pages\CreatePeople;
use App\Filament\Resources\People\Pages\EditPeople;
use App\Filament\Resources\People\Pages\ListPeople;
use App\Models\People;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PeopleResource extends Resource {

    use HasRichContentToolbar;

    protected static ?string $model = People::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-users';

    protected static string|\UnitEnum|null $navigationGroup = 'Content';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $schema): Schema {
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

    public static function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
                ImageColumn::make('avatar'),
                TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                SelectColumn::make('type_id')
                    ->options([
                        '0' => 'Autorky',
                        '1' => 'Kto je kto',
                    ]),
                CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'asc')
            ->filters([
                Filter::make('Autorky')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('type_id', 0)),
                Filter::make('Kto je kto')
                    ->query(fn(Builder $query
                    ): Builder => $query->where('type_id', 1)),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array {
        return [
            //
        ];
    }

    public static function getPages(): array {
        return [
            'index' => ListPeople::route('/'),
            'create' => CreatePeople::route('/create'),
            'edit' => EditPeople::route('/{record}/edit'),
        ];
    }

}
