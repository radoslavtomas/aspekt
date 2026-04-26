<?php

namespace App\Filament\Resources\Downloads;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteBulkAction;
use App\Filament\Resources\Downloads\Pages\ListDownloads;
use App\Filament\Resources\Downloads\Pages\CreateDownload;
use App\Filament\Resources\Downloads\Pages\EditDownload;
use App\Models\Download;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DownloadResource extends Resource
{
    protected static ?string $model = Download::class;

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-arrow-down-tray';
    protected static string | \UnitEnum | null $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 6;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('filepath')
                    ->label('File')
                    ->directory('downloads')
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
                TextColumn::make('filepath')
                    ->limit(40),
                TextColumn::make('filemime')
                    ->limit(20),
                TextColumn::make('filesize'),
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
            'index' => ListDownloads::route('/'),
            'create' => CreateDownload::route('/create'),
            'edit' => EditDownload::route('/{record}/edit'),
        ];
    }
}
