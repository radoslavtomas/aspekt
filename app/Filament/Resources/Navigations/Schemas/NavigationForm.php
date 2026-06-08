<?php

namespace App\Filament\Resources\Navigations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class NavigationForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name_sk')
                    ->label('Menu name (SK)')
                    ->required(),
                TextInput::make('name_en')
                    ->label('Menu name (EN)')
                    ->required(),
                TextInput::make('component')
                    ->required(),
                TextInput::make('route')
                    ->required(),
                TextInput::make('position')
                    ->required(),
            ]);
    }

}
