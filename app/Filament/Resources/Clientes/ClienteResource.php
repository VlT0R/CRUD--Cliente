<?php

namespace App\Filament\Resources\Clientes;
use App\Rules\cpf;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Radio;


use App\Filament\Resources\Clientes\Pages\ManageClientes;
use App\Models\Cliente;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Filament\Resources\Clientes\RelationManagers\TelefonesRelationManager;


class ClienteResource extends Resource
{
    protected static ?string $model = Cliente::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {   
        return $schema
            ->components([
                TextInput::make('nome')
                    ->required(),


                Radio::make('sexo')
                ->options([
                'O' => 'Outro', //"O" éo valor e "Outro" o que o usuário vê
                'M' => 'Maculino',
                'F' => 'Feminino'
                ])->default('O')->columns(3),//cliente começa com o sexo "Outro" já setado

                DatePicker::make('data_nascimento')
                    ->required(),

                TextInput::make('RG')
                ->mask('99.999.999-9')
                ->default(null)
                ->required()
                ->length(12)//obriga a quantidade de caracteres
                ->unique(ignoreRecord: true),//garante que o valor do RG a ser inserido é único
            
                TextInput::make('CPF')
                ->mask('999.999.999-99')
                ->length(14)//obriga a quantidade de caracteres
                ->required()
                ->unique(ignoreRecord: true)//garante que o valor do CPF a ser inserido é único
                ->rules(rules:[new cpf()]),

                Select::make('telefones')
                ->relationship('telefones', 'telefone_completo') // relacao de telefones com cliente
                ->multiple() // permite selecionar vários N:M
                ->preload() // carrega os telefones já existentes no select
                ->searchable(['ddd', 'telefone']), // permite pesquisar por estes campos

                Select::make('enderecos')
                ->relationship('enderecos', 'endereco_completo') // relacao de enderecos com cliente
                ->multiple() // permite selecionar vários N:M
                ->preload() // carrega os enderecos completos já existentes no select
                ->searchable(['endereco_completo']), // permite pesquisar por estes campos

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nome')
            ->columns([
                TextColumn::make('nome')
                    ->searchable(),
                TextColumn::make('sexo')
                    ->searchable(),
                TextColumn::make('data_nascimento')
                    ->date()
                    ->sortable(),
                TextColumn::make('RG')
                    ->searchable(),
                TextColumn::make('CPF')
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

    public static function getRelations():array
    {
        return[
            TelefonesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ManageClientes::route('/'),
        ];
    }
}
