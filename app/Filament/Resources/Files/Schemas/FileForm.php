<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class FileForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                FileUpload::make('filepath')
                    ->label('File')
                    ->directory('files')
                    ->getUploadedFileNameForStorageUsing(
                        function(TemporaryUploadedFile $file): string {
                            $filename = explode('.',
                                $file->getClientOriginalName())[0];
                            return Str::slug($filename).'.'.$file->getClientOriginalExtension();
                        },
                    )
                    ->required(),
            ]);
    }

}
