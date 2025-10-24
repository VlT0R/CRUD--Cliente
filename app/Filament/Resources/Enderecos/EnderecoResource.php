<?php

namespace App\Filament\Resources\Enderecos;

use App\Filament\Resources\Enderecos\Pages\ManageEnderecos;
use App\Models\Endereco;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EnderecoResource extends Resource
{
    protected static ?string $model = Endereco::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'endereco_completo';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('rua')
                    ->required()->maxLength(150),
                TextInput::make('numero')
                    ->required()->maxLength(15),
                TextInput::make('bairro')
                    ->required()->maxLength(150),
                TextInput::make('cidade')
                    ->required()->maxLength(150),
                TextInput::make('estado')
                    ->required()->maxLength(2)
                    ->placeholder('SP,MG,RJ ...')
                    ->dehydrateStateUsing(fn ($state) => strtoupper($state)), //salvar em maiusculo 
                TextInput::make('CEP')
                    ->required()
                    ->mask('99999-999')
                    ->length(9),
                Textarea::make('observacao')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('bairro')
            ->columns([
                TextColumn::make('rua')
                    ->searchable(),
                TextColumn::make('numero')
                    ->searchable(),
                TextColumn::make('bairro')
                    ->searchable(),
                TextColumn::make('cidade')
                    ->searchable(),
                TextColumn::make('estado')
                    ->searchable(),
                TextColumn::make('CEP')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageEnderecos::route('/'),
        ];
    }
}
