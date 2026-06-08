<?php

namespace App\Filament\Resources\Pages\Schemas;

use App\Filament\Concerns\HasRichContentToolbar;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class PageForm {

    use HasRichContentToolbar;

    public static function configure(Schema $schema): Schema {
        return $schema
            ->components([
                TextInput::make('name_sk')
                    ->required(),
                TextInput::make('name_en')
                    ->required(),
                Grid::make()->schema([
                    RichEditor::make('body_sk')
                        ->toolbarButtons(self::richContentToolbar())
                        ->plugins(self::richContentPlugins())
                        ->required(),
                    RichEditor::make('body_en')
                        ->toolbarButtons(self::richContentToolbar())
                        ->plugins(self::richContentPlugins())
                        ->required(),
                ])
                    ->columns(1),
            ])->columns(1);
    }

}
