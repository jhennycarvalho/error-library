@extends('pages.livros.administrador.layoutadm') 

@section('title', 'Editar Livro')

@section('content')
<div class="container mt-7">
    <div id="manual-section" class="form-section mt-4">
        <h2>Editar Livro</h2>

        <form id="edit-book-form" action="{{ route('livros.update', $livro->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="titulo" value="{{ old('titulo', $livro->titulo) }}" required>
                @error('titulo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" class="form-control" id="author" name="autor" value="{{ old('autor', $livro->autor) }}" required>
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="authorHelp" class="form-text">Separe os autores com vírgula. (ex: Clarice Lispector, Machado de Assis).</div>
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" required>{{ old('descricao', $livro->descricao) }}</textarea>
                @error('descricao')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" value="{{ old('editora', $livro->editora) }}" required>
                @error('editora')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="publication-date" class="form-label">Data de Publicação</label>
                <input type="date" class="form-control" name="publicacao_data" id="publication-date" value="{{ old('publicacao_data', $livro->publicacao_data) }}" required>
                @error('publicacao_data')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn', $livro->isbn) }}" required>
                        @error('isbn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div id="isbnHelp" class="form-text">Apenas números. 13 dígitos.</div>
                    </div>
                    <div class="col">
                        <label for="localization" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localization" name="localizacao" value="{{ old('localizacao', $livro->localizacao) }}" required>
                        @error('localizacao')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="pages" class="form-label">Páginas</label>
                        <input type="number" class="form-control" id="pages" name="paginas" value="{{ old('paginas', $livro->paginas) }}" required>
                        @error('paginas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Gênero</label>
                        <select class="form-select" id="genre" name="genero" required>
                            <optgroup label="Ficção">
                                <option value="romance" {{ old('genero', $livro->genero) == 'romance' ? 'selected' : '' }}>Romance</option>
                            </optgroup>
                            <optgroup label="Não Ficção">
                                <option value="biografia" {{ old('genero', $livro->genero) == 'biografia' ? 'selected' : '' }}>Biografia</option>
                            </optgroup>
                        </select>
                        @error('genero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="language" class="form-label">Idioma</label>
                        <select class="form-select" id="language" name="idioma" required>
                            <option value="portugues" {{ old('idioma', $livro->idioma) == 'portugues' ? 'selected' : '' }}>Português</option>
                            <option value="ingles" {{ old('idioma', $livro->idioma) == 'ingles' ? 'selected' : '' }}>Inglês</option>
                        </select>
                        @error('idioma')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="available-copies" class="form-label">Número de Exemplares Disponíveis</label>
                <input type="number" class="form-control" id="available-copies" name="exemplares_disponiveis" value="{{ old('exemplares_disponiveis', $livro->exemplares_disponiveis) }}" min="0" required>
                @error('exemplares_disponiveis')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 mt-4">
                <div id="imageHelp" class="form-text">Carregue arquivos jpg, png ou jpeg. 20 MB no máximo.</div>
                <label for="image_path" class="btn btn-dark w-100 mb-3">
                    <i class="bi bi-image me-2"></i> Imagem da Capa
                </label>
                <input type="file" class="form-control d-none" id="image_path" name="image_path" accept="image/*">
            </div>

            <button type="submit" class="btn btn-success w-100">Salvar</button>
        </form>
    </div>
</div>
@endsection
