<?php

namespace App\Filament\Resources\Clientes\RelationManagers;

use App\Filament\Resources\Clientes\ClienteResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class TelefonesRelationManager extends RelationManager
{
    protected static string $relationship = 'telefones';

    protected static ?string $relatedResource = ClienteResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
