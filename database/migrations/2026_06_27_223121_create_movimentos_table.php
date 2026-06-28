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
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id('id_movimentacao');

            $table->foreignId('id_produto')
            ->constrained('produtos', 'id_produto')
            ->cascadeOnDelete();

            $table->foreignId('id_usuario')
            ->constrained('usuarios', 'id_usuario')
            ->cascadeOnDelete();

            $table->dateTime('data_movimentacao');
            $table->smallInteger('quantidade');
            $table->string('tipo_movimentacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentos');
    }
};
