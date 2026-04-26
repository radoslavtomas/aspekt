<?php

namespace App\Filament\Resources\Files;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Files\Pages\ListFiles;
use App\Filament\Resources\Files\Pages\CreateFile;
use App\Filament\Resources\Files\Pages\EditFile;
use App\Models\File;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;


class FileResource extends Resource
{
    protected static ?string $model = File::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static string | \UnitEnum | null $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('filepath')
                    ->label('File')
                    ->directory('files')
                    ->getUploadedFileNameForStorageUsing(
                        function (TemporaryUploadedFile $file): string {
                            $filename = explode('.', $file->getClientOriginalName())[0];
                            return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                        },
                    )
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('filename')
                    ->limit(30),
                ImageColumn::make('filepath')
                    ->extraImgAttributes([
                        "alt" => " No preview"
                    ]),
                TextColumn::make('filemime')
                    ->limit(20),
                TextColumn::make('filesize')
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
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
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
            'index' => ListFiles::route('/'),
            'create' => CreateFile::route('/create'),
            'edit' => EditFile::route('/{record}/edit'),
        ];
    }
}
