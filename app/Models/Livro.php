<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //
    protected $fillable = [
        'titulo', 'autor', 'descricao', 'editora', 'publicacao_data',
        'isbn', 'localizacao', 'paginas', 'genero', 'idioma', 'image_path','exemplares_disponiveis'
    ];
}
