<?php

namespace App\Filament\Resources\Telefones\Pages;

use App\Filament\Resources\Telefones\TelefoneResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTelefone extends CreateRecord
{
    protected static string $resource = TelefoneResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}


