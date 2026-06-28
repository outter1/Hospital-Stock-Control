<?php

namespace App\Filament\Resources\Produtos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProdutosTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id_produto')
                ->label('ID Produto')
                ->numeric()
                ->sortable(),

            TextColumn::make('usuario.nome')
                ->label('Usuário')
                ->searchable()
                ->sortable(),

            TextColumn::make('nome')
                ->searchable(),

            TextColumn::make('data_validade')
                ->date()
                ->sortable(),

            TextColumn::make('fabricante')
                ->searchable(),

            TextColumn::make('numero_lote')
                ->searchable(),

            TextColumn::make('temperatura')
                ->searchable(),

            TextColumn::make('aplicacao')
                ->searchable(),

            TextColumn::make('quantidade_atual')
                ->numeric()
                ->sortable(),

            TextColumn::make('estoque_minimo')
                ->numeric()
                ->sortable(),

            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),

            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
