<?php

namespace App\Filament\Resources\Movimentos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MovimentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_produto')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('id_usuario')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('data_movimentacao')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('quantidade')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tipo_movimentacao')
                    ->searchable(),
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
