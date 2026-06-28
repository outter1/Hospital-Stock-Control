<?php

namespace App\Filament\Resources\Produtos\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;


class ProdutoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_usuario')
                    ->label('Usuário')
                    ->relationship('usuario', 'nome')
                    ->required(),
                TextInput::make('nome')
                    ->required(),
                DatePicker::make('data_validade')
                    ->required(),
                TextInput::make('fabricante')
                    ->required(),
                TextInput::make('numero_lote')
                    ->required(),
                TextInput::make('temperatura')
                    ->required(),
                TextInput::make('aplicacao')
                    ->required(),
                TextInput::make('quantidade_atual')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('estoque_minimo')
                    ->required()
                    ->numeric(),
            ]);
    }
}
