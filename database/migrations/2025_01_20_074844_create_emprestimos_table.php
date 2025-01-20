<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('emprestimos', function (Blueprint $table) {
        $table->id('id_emprestimo'); // ID principal
        $table->unsignedBigInteger('usuario_id'); // Chave estrangeira para 'users'
        $table->unsignedBigInteger('livro_id'); // Chave estrangeira para 'livros'
        $table->string('status')->default('Em andamento'); // Status do empréstimo
        $table->date('data_emprestimo'); // Data do empréstimo
        $table->date('data_devolucao')->nullable(); // Data de devolução (opcional)
        $table->timestamps(); // Campos created_at e updated_at

        // Definir as chaves estrangeiras
        $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
