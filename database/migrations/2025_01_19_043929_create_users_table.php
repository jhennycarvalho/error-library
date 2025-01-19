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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // chave primária
            $table->string('name'); // nome do usuário
            $table->string('email')->unique(); // email único
            $table->timestamp('email_verified_at')->nullable(); // data de verificação do email
            $table->string('password'); // senha
            $table->string('num_matricula')->unique()->nullable(); // número de matrícula (opcional)
            $table->string('serie')->nullable(); // série (opcional)
            $table->string('turno')->nullable(); // turno (opcional)
            $table->string('telefone')->nullable(); // telefone (opcional)
            $table->string('endereco')->nullable(); // endereço (opcional)
            $table->rememberToken(); // token para lembrar usuário
            $table->timestamps(); // campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // exclui a tabela se a migração for revertida
    }
};
