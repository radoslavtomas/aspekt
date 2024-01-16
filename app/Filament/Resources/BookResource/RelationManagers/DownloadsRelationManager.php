<?php

namespace App\Filament\Resources\BookResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Contracts\HasRelationshipTable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadsRelationManager extends RelationManager
{
    protected static string $relationship = 'downloads';

    protected static ?string $recordTitleAttribute = 'filepath';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('filepath')
                    ->preserveFilenames()
                    ->directory('downloads'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('filename'),
                Tables\Columns\TextColumn::make('filesize')
                    ->formatStateUsing(fn (string $state): string => (formatFileSizeUnits($state))),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
                Tables\Actions\CreateAction::make()
                    ->using(function (HasRelationshipTable $livewire, array $data): Model {
                        $file = $data['filepath'];
                        $data['filepath'] = '/'.$file;
                        $data['filemime'] = Storage::mimeType('/'.$file);
                        $data['filesize'] = Storage::size('/'.$file);
                        $data['filename'] = Str::replace('downloads/', '', $file);

                        return $livewire->getRelationship()->create($data);
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
}
