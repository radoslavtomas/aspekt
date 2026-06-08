<?php

namespace App\Filament\Resources\OrderCountries\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderCountryForm {

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('country_name_sk')
                    ->label('Country SK'),
                TextInput::make('country_name_en')
                    ->label('Country EN'),
                TextInput::make('country_iso_code_2')
                    ->label('Country ISO 2'),
                TextInput::make('country_iso_code_3')
                    ->label('Country ISO 3'),
            ]);
    }

}
