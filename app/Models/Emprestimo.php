<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    protected $table = 'emprestimos'; // Nome da tabela
    protected $primaryKey = 'id_emprestimo'; // Nome da chave primária

    protected $fillable = [
        'usuario_id',
        'livro_id',
        'status',
        'data_emprestimo',
        'data_devolucao',
    ];

    // Relacionamento com o usuário
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacionamento com o livro
    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
}
