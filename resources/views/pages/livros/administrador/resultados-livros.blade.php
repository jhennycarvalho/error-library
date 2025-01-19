<!-- resources/views/pages/livros/administrador/resultados-livros.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Resultados da Busca</h1>
    @if($livros->isEmpty())
        <p>Nenhum livro encontrado.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                    <tr>
                        <td>{{ $livro->titulo }}</td>
                        <td>{{ $livro->autor }}</td>
                        <td>{{ $livro->descricao }}</td>
                        <td>
                            <a href="{{ route('livros.edit', $livro->id) }}">Editar</a>
                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
