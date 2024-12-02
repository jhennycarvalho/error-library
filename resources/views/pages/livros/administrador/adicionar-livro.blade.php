@extends('pages.livros.administrador.layoutadm')
@section('title', 'Adicionar Livro')
<x-slot name="adicionar livro">
    @yield('title')
</x-slot>
@section('content')

<div class="container mt-7">
    <div class="row">
        <div class="col-12">
            <h1 class="text-start">Adicionar Livro</h1>
        </div>
        <div class="col-12 mt-3">
            <button id="search-btn" class="btn btn-link nav-button ms-0">Procurar</button>
            <button id="manual-entry-btn" class="btn btn-link nav-button ms-3">Entrada Manual</button>
        </div>
        <hr>
    </div>

    <div id="search-section" class="form-section mt-4">
        <h2>Procurar por Livros</h2>
        <input type="text" class="form-control mb-3" id="search-input" placeholder="Digite o nome do livro">
        <button id="search-action-btn" class="btn btn-primary">Buscar</button>
    </div>

    <div id="manual-section" class="form-section mt-4">
        <h2>Livro</h2>

        <form id="add-book-form" action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Título:</label>
                <input type="text" class="form-control" id="title" name="titulo" required>
                @error('titulo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor:</label>
                <input type="text" class="form-control" id="author" name="autor" required>
                @error('autor')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <div id="authorHelp" class="form-text">Separe os autores com vírgula. (ex: Clarice Lispector, Machado de Assis).</div>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="5" required></textarea>
                @error('descricao')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="editora" class="form-label">Editora:</label>
                <input type="text" class="form-control" id="editora" name="editora" required>
                @error('editora')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="publication-date" class="form-label">Data de Publicação</label>
                <input type="date" class="form-control" name="publicacao_data" id="publication-date" required>
                @error('publicacao_data')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                        @error('isbn')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div id="isbnHelp" class="form-text">Apenas números. 13 dígitos.</div>
                    </div>
                    <div class="col">
                        <label for="localization" class="form-label">Localização</label>
                        <input type="text" class="form-control" id="localization" name="localizacao" required>
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
                        <input type="number" class="form-control" id="pages" name="paginas" required>
                        @error('paginas')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="genre" class="form-label">Gênero</label>
                        <select class="form-select" id="genre" name="genero" required>
                            <optgroup label="Ficção">
                                <option value="romance">Romance</option>
                            </optgroup>
                            <optgroup label="Não Ficção">
                                <option value="biografia">Biografia</option>
                            </optgroup>
                        </select>
                        @error('genero')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="language" class="form-label">Idioma</label>
                        <select class="form-select" id="language" name="idioma" required>
                            <option value="portugues">Português</option>
                            <option value="ingles">Inglês</option>
                        </select>
                        @error('idioma')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <div id="imageHelp" class="form-text">Carregue arquivos jpg, png ou jpeg. 20 MB no máximo.</div>
                <label for="image_path" class="btn btn-dark w-100 mb-3">
                    <i class="bi bi-image me-2"></i> Imagem da Capa
                </label>
                <input type="file" class="form-control d-none" id="image_path" name="image_path" accept="image/*">
                
                <button type="submit" class="btn btn-success w-100">Salvar</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#manual-entry-btn').addClass('active');
        $('#manual-section').show();
        $('#search-section').hide();

        $('#search-btn').on('click', function() {
            $('#manual-section').hide();
            $('#search-section').show();
            $('#manual-entry-btn').removeClass('active');
            $('#search-btn').addClass('active');
        });

        $('#manual-entry-btn').on('click', function() {
            $('#search-section').hide();
            $('#manual-section').show();
            $('#search-btn').removeClass('active');
            $('#manual-entry-btn').addClass('active');
        });
    });
</script>
@endpush
@endsection
