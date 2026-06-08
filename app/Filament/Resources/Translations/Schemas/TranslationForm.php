<?php

namespace App\Filament\Resources\Translations\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TranslationForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('key')->unique(ignoreRecord: true),
                Textarea::make('sk'),
                Textarea::make('en'),
            ])->columns(1);
    }

}
