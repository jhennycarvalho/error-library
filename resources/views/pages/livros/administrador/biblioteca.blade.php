<x-layout>
    @section('title', 'Empréstimo de Livro')
    <x-slot name="biblioteca">
        @yield('title')
    </x-slot>

    <!-- Caixa de pesquisa e botão de filtros -->
    <div class="container-fluid px-4">
        <!-- Título da página -->
        <h1 class="mt-4" style="font-size: 24px;">@yield('title')</h1>
        
        <!-- Caixa de pesquisa -->
        <div class="p-3 rounded shadow mb-4" style="background-color: rgb(227, 224, 224);">
            <div class="d-flex align-items-center">
                <div class="input-group" style="flex-grow: 1;">
                    <span class="input-group-text bg-white text-muted" style="border: 1px solid #ced4da;">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Comece a procurar..." id="searchInput"
                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Comece a procurar...'" style="border: 1px solid #ced4da;" onkeyup="filterBooks()">
                </div>
                <button class="btn btn-dark ms-3" type="button" id="button-filter" data-bs-toggle="modal" data-bs-target="#filterModal" style="display: flex; align-items: center;">
                    <i class="fas fa-filter me-1"></i> Filtros
                </button>
            </div>
        </div>

        <!-- Fita do Alfabeto -->
        <div class="mb-4" style="background-color: white; padding: 10px; display: flex; justify-content: center; align-items: center; border-radius: 5px;">
            <div style="flex: 1; text-align: center;">
                @foreach (range('A', 'Z') as $letter)
                    <a href="#" class="text-dark letter-link" style="margin: 0 5px; text-decoration: none; padding: 5px; border-radius: 5px;" onclick="filterByLetter('{{ $letter }}')">
                        {{ $letter }}
                    </a>
                @endforeach
                <a href="#" class="text-dark letter-link" style="margin: 0 5px; text-decoration: none; padding: 5px; border-radius: 5px;" onclick="showAllBooks()">Todos</a>
            </div>
        </div>
    </div>

    <!-- Modal de Filtros -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Filtros</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Gênero</label>
                            <select class="form-select" id="genre">
                                <option selected>Escolha um gênero</option>
                                <option value="1">Ficção</option>
                                <option value="2">Não-Ficção</option>
                                <option value="3">Fantasia</option>
                                <option value="4">Romance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="publicationYear" class="form-label">Ano de Publicação</label>
                            <input type="number" class="form-control" id="publicationYear" placeholder="Ex: 2022" min="1900" max="2100" step="1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Aplicar Filtros</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Seção de livros -->
    <div class="container-fluid px-4" id="booksContainer">
        <div class="row">
            @foreach ($livros as $livro)
                <div class="col-2 mb-4 text-center book" data-letter="{{ strtoupper(substr($livro->titulo, 0, 1)) }}" id="book-{{ $livro->id }}">
                    <div class="card" style="border: none;">
                        <img src="{{ $livro->image_path ? url('livros/' . basename($livro->image_path)) : asset('images/default-image.jpg') }}" 
                            class="card-img-top" 
                            alt="{{ $livro->titulo }}" 
                            style="max-height: 200px;">
                        <div class="card-body" style="padding: 10px;">
                            <h5 class="card-title" style="font-size: 14px;">{{ $livro->titulo }}</h5>
                            <p class="card-text" style="font-size: 12px;">{{ $livro->autor }}</p>
                            <p class="card-text" style="font-size: 12px; font-weight: bold;">{{ $livro->exemplares_disponiveis }} Exemplares Disponíveis</p> <!-- Quantidade de Exemplares -->
                            <a href="#" class="btn btn-light" style="background-color: #d5d7da; color: #000; width: 100%;" onclick="selectBook({{ $livro->id }})">Emprestar</a>
                            <a href="{{ route('livros.edit', $livro->id) }}" class="btn btn-light" style="background-color: #d5d7da; color: #000; width: 100%;">Editar</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal de confirmação de empréstimo -->
    <div class="modal fade" id="emprestimoModal" tabindex="-1" aria-labelledby="emprestimoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emprestimoModalLabel">Confirmar Empréstimo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você selecionou o livro <span id="bookTitle"></span> para emprestar. Tem certeza?</p>
                    <form id="emprestimoForm" method="POST" action="{{ route('emprestimos.store') }}">
                        @csrf
                        <input type="hidden" name="livro_id" id="livro_id">
                        <input type="hidden" name="usuario_id" value="{{ auth()->id() }}">
                        <div class="mb-3">
                            <label for="data_emprestimo" class="form-label">Data de Empréstimo</label>
                            <input type="text" class="form-control" id="data_emprestimo" name="data_emprestimo" required>
                        </div>
                        <div class="mb-3">
                            <label for="data_devolucao" class="form-label">Data de Devolução</label>
                            <input type="text" class="form-control" id="data_devolucao" name="data_devolucao" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" onclick="submitEmprestimo()">Confirmar Empréstimo</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script>
        // Filtragem de livros
        function filterBooks() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const books = document.querySelectorAll('.book');
            
            books.forEach(book => {
                const title = book.querySelector('.card-title').textContent.toLowerCase();
                if (title.includes(input)) {
                    book.style.display = '';
                } else {
                    book.style.display = 'none';
                }
            });
        }

        function filterByLetter(letter) {
            const books = document.querySelectorAll('.book');
            
            books.forEach(book => {
                const bookLetter = book.getAttribute('data-letter');
                if (bookLetter.startsWith(letter)) {
                    book.style.display = '';
                } else {
                    book.style.display = 'none';
                }
            });
        }

        function showAllBooks() {
            const books = document.querySelectorAll('.book');
            books.forEach(book => {
                book.style.display = '';
            });
        }

        // Função para selecionar um livro para empréstimo
        function selectBook(bookId) {
            const bookElement = document.getElementById('book-' + bookId);
            const bookTitle = bookElement.querySelector('.card-title').textContent;
            const availableCopies = bookElement.querySelector('.card-text').textContent;

            // Exibe o nome do livro no modal
            document.getElementById('bookTitle').textContent = bookTitle;
            document.getElementById('livro_id').value = bookId;

            // Exibe o modal
            new bootstrap.Modal(document.getElementById('emprestimoModal')).show();
        }

        // Função para enviar o formulário de empréstimo
        function submitEmprestimo() {
            const form = document.getElementById('emprestimoForm');
            form.submit();
        }
    </script>
    @endpush  

    <style>
        .letter-link {
            transition: background-color 0.3s, color 0.3s;
        }

        .letter-link:hover {
            background-color: #d5d7da; /* Cinza claro */
            border-radius: 5px;
            color: #000; /* Cor do texto */
        }

        /* Estilo para o campo de pesquisa */
        .input-group {
            flex-grow: 1;
            min-width: 300px; /* Largura mínima do campo de pesquisa */
        }
    </style>
</x-layout>
