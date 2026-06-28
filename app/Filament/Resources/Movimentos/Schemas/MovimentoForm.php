<?php

namespace App\Filament\Resources\Movimentos\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MovimentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_produto')
                    ->label('Produto')
                    ->relationship('produto', 'nome')
                    ->required(),

                Select::make('id_usuario')
                    ->label('Responsável')
                    ->relationship('usuario', 'nome')
                    ->required(),

                DateTimePicker::make('data_movimentacao')
                    ->label('Data da movimentação')
                    ->required(),

                TextInput::make('quantidade')
                    ->label('Quantidade')
                    ->numeric()
                    ->required(),

                Select::make('tipo_movimentacao')
                    ->label('Tipo de movimentação')
                    ->options([
                        'entrada' => 'Entrada',
                        'saida' => 'Saída',
                    ])
                    ->required(),
            ]);
    }
}