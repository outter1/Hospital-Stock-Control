<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nome',
        'email',
        'cargo',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'id_usuario', 'id_usuario');
    }

    public function movimentacoes()
    {
        return $this->hasMany(Movimento::class, 'id_usuario', 'id_usuario');
    }
}