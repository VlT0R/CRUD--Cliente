<?php

namespace App\Filament\Resources\Telefones\Pages;

use App\Filament\Resources\Telefones\TelefoneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTelefone extends EditRecord
{
    protected static string $resource = TelefoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
