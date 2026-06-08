<?php

namespace App\Filament\Resources\Settings\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SettingsForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('key')->unique(ignoreRecord: true),
                Textarea::make('value'),
                Checkbox::make('active'),
            ])->columns(1);
    }

}
