<?php

namespace App\Filament\Resources\Books\RelationManagers;

use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\AttachAction;
use Filament\Actions\CreateAction;
use Filament\Actions\DetachAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FilesRelationManager extends RelationManager {

    protected static string $relationship = 'files';

    protected static ?string $recordTitleAttribute = 'filepath';

    public function form(Schema $schema): Schema {
        return $schema
            ->components([
                FileUpload::make('filepath')
                    ->getUploadedFileNameForStorageUsing(
                        function(TemporaryUploadedFile $file): string {
                            $filename = explode('.',
                                $file->getClientOriginalName())[0];
                            return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                        },
                    )
                    ->directory('files'),
            ]);
    }

    public function table(Table $table): Table {
        return $table
            ->columns([
                TextColumn::make('filename')
                    ->wrap(),
                TextColumn::make('filepath')
                    ->prefix(config('app.url').'/storage')
                    ->copyable()
                    ->copyableState(fn(string $state
                    ): string => config('app.url').'/storage'.$state)
                    ->copyMessage('Link copied')
                    ->copyMessageDuration(1500)
                    ->wrap(),
                TextColumn::make('filesize')
                    ->formatStateUsing(fn(string $state
                    ): string => (formatFileSizeUnits($state))),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                AttachAction::make(),
                CreateAction::make()
                    ->mutateDataUsing(function(array $data): array {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType($file);
                        $data['filesize'] = Storage::size($file);
                        $data['filename'] = Str::replace('files/', '', $file);

                        return $data;
                    }),
            ])
            ->recordActions([
                DetachAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }

}
