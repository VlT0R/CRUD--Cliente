<?php

namespace App\Filament\Resources\Telefones\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TelefoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ddd')
                    ->mask('(99)')
                    ->length(4)
                    ->required(),
                TextInput::make('telefone')
                    ->tel()
                    ->mask('99999-9999')
                    ->length(10)
                    ->required(),
            ]);
    }
}
