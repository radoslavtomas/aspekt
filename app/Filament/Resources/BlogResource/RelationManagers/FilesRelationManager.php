<?php

namespace App\Filament\Resources\BlogResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FilesRelationManager extends RelationManager {

    protected static string $relationship = 'files';

    protected static ?string $recordTitleAttribute = 'filepath';

    public function table(Table $table): Table {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filename')
                    ->wrap(),
                Tables\Columns\TextColumn::make('filepath')
                    ->prefix(config('app.url').'/storage')
                    ->copyable()
                    ->copyableState(fn(string $state
                    ): string => config('app.url').'/storage'.$state)
                    ->copyMessage('Link copied')
                    ->copyMessageDuration(1500)
                    ->wrap(),
                Tables\Columns\TextColumn::make('filesize')
                    ->formatStateUsing(fn(string $state
                    ): string => (formatFileSizeUnits($state))),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function(array $data): array {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType($file);
                        $data['filesize'] = Storage::size($file);
                        $data['filename'] = Str::replace('files/', '', $file);

                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\DetachAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public function form(Form $form): Form {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('filepath')
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

}
