<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id('id_produto');

            $table->foreignId('id_usuario')
            ->constrained('usuarios', 'id_usuario')
            ->cascadeOnDelete(); //caso usuario for apagado, produtos que estão ligados também serão apagados.

            $table->string('nome');
            $table->date('data_validade');
            $table->string('fabricante');
            $table->string('numero_lote');
            $table->string('temperatura');
            $table->string('aplicacao');
            $table->integer('quantidade_atual')->default(0);
            $table->integer('estoque_minimo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
