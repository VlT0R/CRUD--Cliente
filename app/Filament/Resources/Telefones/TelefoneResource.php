<?php

namespace App\Filament\Resources\Telefones;

use App\Filament\Resources\Telefones\Pages\CreateTelefone;
use App\Filament\Resources\Telefones\Pages\EditTelefone;
use App\Filament\Resources\Telefones\Pages\ListTelefones;
use App\Filament\Resources\Telefones\Schemas\TelefoneForm;
use App\Filament\Resources\Telefones\Tables\TelefonesTable;
use App\Models\Telefone;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TelefoneResource extends Resource
{
    protected static ?string $model = Telefone::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'telefone_completo';

    public static function form(Schema $schema): Schema
    {
        return TelefoneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TelefonesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTelefones::route('/'),
            'create' => CreateTelefone::route('/create'),
            'edit' => EditTelefone::route('/{record}/edit'),
        ];
    }
}
