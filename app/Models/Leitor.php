<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'password',
        'num_matricula',
        'serie',
        'turno',
        'telefone',
        'endereco',
    ];
}

