<?php

namespace App\Models;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id_produto';

    protected $fillable = [
        'id_usuario',
        'nome',
        'data_validade',
        'fabricante',
        'numero_lote',
        'temperatura',
        'aplicacao',
        'quantidade_atual',
        'estoque_minimo',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
        // Produto pertence a um usuário.
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimento::class, 'id_produto', 'id_produto');
        // Produto possui várias movimentações.
    }
}