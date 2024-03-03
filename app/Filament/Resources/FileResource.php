<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FileResource\Pages;
use App\Filament\Resources\FileResource\RelationManagers;
use App\Models\File;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;


class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('filepath')
                    ->label('File')
                    ->directory('files')
                    ->preserveFilenames()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filename')
                    ->limit(30),
                Tables\Columns\ImageColumn::make('filepath')
                    ->extraImgAttributes([
                        "alt" => "&nbsp;No preview"
                    ]),
                Tables\Columns\TextColumn::make('filemime')
                    ->limit(20),
                Tables\Columns\TextColumn::make('filesize')
                    ->formatStateUsing(fn(string $state): string => (formatFileSizeUnits($state))),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('Images')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%image%')),
                Filter::make('Pdfs')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%pdf%')),
                Filter::make('Word docments')
                    ->query(fn(Builder $query): Builder => $query
                        ->where('filemime', 'like', '%word%')),
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
            'index' => Pages\ListFiles::route('/'),
            'create' => Pages\CreateFile::route('/create'),
            'edit' => Pages\EditFile::route('/{record}/edit'),
        ];
    }
}
