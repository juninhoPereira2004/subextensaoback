<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissaoTable extends Migration
{
    public function up()
    {
        Schema::create('profissoes', function (Blueprint $table) {
            $table->id();  // Cria a coluna 'id' como 'unsignedBigInteger'
            $table->string('nome');  // Nome da profissão
            $table->text('descricao')->nullable();  // Descrição da profissão (opcional)
            $table->decimal('salario', 10, 2);  // Salário (pode ajustar a precisão conforme necessário)
            $table->string('empresa');  // Empresa associada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profissoes');
    }
}
