<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeopleResource\Pages;
use App\Filament\Resources\PeopleResource\RelationManagers;
use App\Models\People;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PeopleResource extends Resource
{
    protected static ?string $model = People::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Quick settings')
                    ->schema([
                        Forms\Components\Select::make('type_id')
                            ->options([
                                '0' => 'Autorky',
                                '1' => 'Kto je kto',
                            ]),
                        Forms\Components\Checkbox::make('published'),
                    ])
                    ->columns(2),
                Fieldset::make('Person details')
                    ->schema([
                        Forms\Components\FileUpload::make('avatar')
                            ->getUploadedFileNameForStorageUsing(
                                function (TemporaryUploadedFile $file): string {
                                    $filename = explode('.', $file->getClientOriginalName())[0];
                                    return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                                },
                            )
                            ->directory('avatars')
                            ->imageResizeMode('contain')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeUpscale(false),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                                if (Str::slug($old)) {
                                    return;
                                }

                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TiptapEditor::make('teaser')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('body')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('links')
                            ->profile('custom'),
                        Forms\Components\Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en'
                            ])
                            ->default('sk')
                            ->disablePlaceholderSelection(),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->sortable()
                    ->date('d.m.Y H:i:s'),
                Tables\Columns\ImageColumn::make('avatar'),
                Tables\Columns\TextColumn::make('title')
                    ->limit(50)
                    ->searchable(),
                Tables\Columns\SelectColumn::make('type_id')
                    ->options([
                        '0' => 'Autorky',
                        '1' => 'Kto je kto',
                    ]),
                Tables\Columns\CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->filters([
                Filter::make('Autorky')
                    ->query(fn(Builder $query): Builder => $query->where('type_id', 0)),
                Filter::make('Kto je kto')
                    ->query(fn(Builder $query): Builder => $query->where('type_id', 1))
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
            'index' => Pages\ListPeople::route('/'),
            'create' => Pages\CreatePeople::route('/create'),
            'edit' => Pages\EditPeople::route('/{record}/edit'),
        ];
    }
}
