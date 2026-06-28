<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimentos';
    protected $primaryKey = 'id_movimentacao';

    protected $fillable = [
        'id_produto',
        'id_usuario',
        'data_movimentacao',
        'quantidade',
        'tipo_movimentacao',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'id_produto', 'id_produto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}