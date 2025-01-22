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
        Schema::create('leitors', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // email único
            $table->timestamp('email_verified_at')->nullable(); // data de verificação do email
            $table->string('num_matricula')->unique()->nullable(); // número de matrícula (opcional)
            $table->string('serie')->nullable(); // série (opcional)
            $table->string('turno')->nullable(); // turno (opcional)
            $table->string('telefone')->nullable(); // telefone (opcional)
            $table->string('endereco')->nullable(); // endereço (opcional)

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leitors');
    }
};
