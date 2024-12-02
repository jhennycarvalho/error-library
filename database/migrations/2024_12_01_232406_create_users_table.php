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
            $table->id();  // Campo ID, chave primária
            $table->string('name');  // Nome do usuário
            $table->string('email')->unique();  // E-mail do usuário, que deve ser único
            $table->timestamp('email_verified_at')->nullable();  // Data de verificação do e-mail (nullable)
            $table->string('password');  // Senha do usuário
            $table->rememberToken();  // Token para "lembrar" o usuário
            $table->timestamps();  // Marca de criação e atualização de registros
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');  // Exclui a tabela users se a migração for revertida
    }
};
