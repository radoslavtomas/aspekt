<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadResource\Pages;
use App\Filament\Resources\DownloadResource\RelationManagers;
use App\Models\Download;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static ?string $navigationGroup = 'Content';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('filepath')
                    ->label('File')
                    ->directory('downloads')
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
                Tables\Columns\TextColumn::make('filepath')
                    ->limit(40),
                Tables\Columns\TextColumn::make('filemime')
                    ->limit(20),
                Tables\Columns\TextColumn::make('filesize'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
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
            'index' => Pages\ListDownloads::route('/'),
            'create' => Pages\CreateDownload::route('/create'),
            'edit' => Pages\EditDownload::route('/{record}/edit'),
        ];
    }
}
