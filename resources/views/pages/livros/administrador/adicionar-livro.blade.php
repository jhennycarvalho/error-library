
    @extends('pages.livros.administrador.layoutadm')
    @section('title', 'Adicionar Livro')
    <x-slot name="adicionar livro">
        @yield('title')
    </x-slot>
    @section('content')

    <div class="container mt-7">
        <!-- Usando um row do Bootstrap para alinhar tudo -->
        <div class="row">
            <div class="col-12">
                <!-- Alinhando o título e os botões à esquerda -->
                <h1 class="text-start">Adicionar Livro</h1>
            </div>
            <div class="col-12 mt-3">
                <!-- Botões para Procurar e Entrada Manual, alinhados ao título -->
                <button id="search-btn" class="btn btn-link nav-button ms-0">Procurar</button>
                <button id="manual-entry-btn" class="btn btn-link nav-button ms-3">Entrada Manual</button>
            </div>
            <!-- Linha horizontal cinza abaixo dos botões -->
            <hr>
        </div>

        <!-- Seção para busca de livro, alinhada à esquerda -->
        <div id="search-section" class="form-section mt-4">
            <h2>Procurar por Livros</h2>
            <input type="text" class="form-control mb-3" id="search-input" placeholder="Digite o nome do livro">
            <button id="search-action-btn" class="btn btn-primary">Buscar</button>
        </div>

        <!-- Seção para entrada manual de informações, alinhada à esquerda -->
        <div id="manual-section" class="form-section mt-4">
            <h2>Livro</h2>

            <form id="add-book-form" action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título:</label>
                    <input type="text" class="form-control" id="title" name="titulo"> <!-- Corrigido -->
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Autor:</label>
                    <input type="text" class="form-control" id="author" name="autor"> <!-- Corrigido -->
                    <div id="authorHelp" class="form-text">Separe os autores com vírgula. (ex: Clarice Lispector, Machado de Assis).</div>
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="5"></textarea> <!-- Corrigido -->
                </div>
                <div class="mb-3">
                    <label for="editora" class="form-label">Editora:</label>
                    <input type="text" class="form-control" id="editora" name="editora"> <!-- Corrigido -->
                </div>
                <div class="mb-3">
                    <label for="publication-date" class="form-label">Data de Publicação</label>
                    <div class="row g-3" id="publication-date">
                        <div class="col">
                            <input type="number" class="form-control" name="dia" placeholder="Dia" aria-label="Dia"> <!-- Adicionado nome -->
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="mes" placeholder="Mês" aria-label="Mês"> <!-- Adicionado nome -->
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="ano" placeholder="Ano" aria-label="Ano"> <!-- Adicionado nome -->
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row g-3">
                        <div class="col">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn"> <!-- Corrigido -->
                            <div id="isbnHelp" class="form-text">Apenas números. 13 dígitos.</div> <!-- Corrigido ID -->
                        </div>
                        <div class="col">
                            <label for="localization" class="form-label">Localização</label>
                            <input type="text" class="form-control" id="localization" name="localizacao"> <!-- Corrigido -->
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row g-3">
                        <div class="col">
                            <label for="pages" class="form-label">Páginas</label>
                            <input type="number" class="form-control" id="pages" name="paginas" placeholder="Páginas" aria-label="Páginas"> <!-- Corrigido -->
                        </div>
                        <div class="col">
                            <label for="genre" class="form-label">Gênero</label>
                            <select class="form-select" id="genre" name="genero" aria-label="Gênero"> <!-- Corrigido -->
                                <optgroup label="Ficção">
                                    <option value="romance">Romance</option>
                                    <!-- Outros gêneros aqui -->
                                </optgroup>
                                <optgroup label="Não Ficção">
                                    <option value="biografia">Biografia</option>
                                    <!-- Outros gêneros aqui -->
                                </optgroup>
                            </select>
                        </div>
                        <div class="col">
                            <label for="language" class="form-label">Idioma</label>
                            <select class="form-select" id="language" name="idioma" aria-label="Idioma"> <!-- Corrigido -->
                                <option value="portugues">Português</option>
                                <option value="ingles">Inglês</option>
                                <!-- Outros idiomas aqui -->
                            </select>
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>

    <script>
        $(document).ready(function() {
            // Por padrão, mostra a seção de "Entrada Manual"
            $('#manual-entry-btn').addClass('active');
            $('#manual-section').show();
            $('#search-section').hide();
    
            // Alterna entre as seções "Procurar" e "Entrada Manual"
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




