<?php

namespace App\Filament\Resources\Telefones\Pages;

use App\Filament\Resources\Telefones\TelefoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTelefones extends ListRecords
{
    protected static string $resource = TelefoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
