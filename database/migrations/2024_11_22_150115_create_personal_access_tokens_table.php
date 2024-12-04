<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalAccessTokensTable extends Migration
{
    /**
     * Execute a migration para criar a tabela personal_access_tokens.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();  // Cria a coluna 'id' como 'unsignedBigInteger'
            $table->unsignedBigInteger('tokenable_id');  // Defina como 'unsignedBigInteger'
            $table->string('name');
            $table->text('abilities')->nullable();
            $table->timestamps();

            // Defina a chave estrangeira corretamente, referenciando a tabela 'profissoes'
            $table->foreign('tokenable_id')->references('id')->on('profissoes')->onDelete('cascade');
        });
    }

    /**
     * Reverter a migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
}
