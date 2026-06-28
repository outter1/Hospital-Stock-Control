<?php

namespace App\Filament\Resources\Movimentos\Pages;

use App\Filament\Resources\Movimentos\MovimentoResource;
use App\Models\Produto;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateMovimento extends CreateRecord
{
    protected static string $resource = MovimentoResource::class;

    protected function afterCreate(): void
    {
        $movimento = $this->record;

        $produto = Produto::find($movimento->id_produto);

        if (! $produto) {
            return;
        }

        if ($movimento->tipo_movimentacao === 'entrada') {
            $produto->quantidade_atual += $movimento->quantidade;
        }

        if ($movimento->tipo_movimentacao === 'saida') {
            $produto->quantidade_atual -= $movimento->quantidade;
        }

        $produto->save();

        if (
            $movimento->tipo_movimentacao === 'saida' &&
            $produto->quantidade_atual < $produto->estoque_minimo
        ) {
            Notification::make()
                ->title('Alerta de estoque mínimo')
                ->body("O produto {$produto->nome} está abaixo do estoque mínimo. Quantidade atual: {$produto->quantidade_atual}.")
                ->danger()
                ->send();
        }
    }
}