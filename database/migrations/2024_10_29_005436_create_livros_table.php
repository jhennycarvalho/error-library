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
    Schema::create('livros', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->string('autor');
        $table->text('descricao');
        $table->string('editora');
        $table->date('publicacao_data');
        $table->string('isbn', 13);
        $table->string('localizacao')->nullable();
        $table->integer('paginas');
        $table->string('genero');
        $table->string('idioma');
        $table->string('image_path')->nullable();
        $table->integer('exemplares_disponiveis')->default(1);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
