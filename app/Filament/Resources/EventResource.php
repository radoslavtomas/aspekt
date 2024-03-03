<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Main')
                    ->columns(1)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        Forms\Components\TextInput::make('slug')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\TextInput::make('subtitle'),
                        Forms\Components\DateTimePicker::make('date'),
                        Forms\Components\TextInput::make('place'),
                        TiptapEditor::make('teaser')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('body')
                            ->profile('custom')
                            ->required(),
                        TiptapEditor::make('links')
                            ->profile('custom'),
                        Forms\Components\FileUpload::make('feature_img')
                            ->image()
                            ->preserveFilenames()
                            ->directory('featured_images')
                            ->label('Featured image')
                    ]),
                Fieldset::make('Event settings')
                    ->schema([
                        Forms\Components\Hidden::make('user_id')
                            ->default(Auth::id()),
                        Forms\Components\Grid::make()->schema([
                            Forms\Components\Checkbox::make('featured'),
                            Forms\Components\Checkbox::make('published'),
                        ])->columns(1),
                        Forms\Components\Select::make('language')
                            ->options([
                                'sk' => 'sk',
                                'en' => 'en'
                            ])
                            ->default('sk')
                            ->required(),
                    ]),
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
                Tables\Columns\CheckboxColumn::make('featured')
                    ->sortable(),
                Tables\Columns\CheckboxColumn::make('published')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('featured')
                    ->query(fn(Builder $query): Builder => $query->where('featured', true)),
                Filter::make('not published')
                    ->query(fn(Builder $query): Builder => $query->where('published', false))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
