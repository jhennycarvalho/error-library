<x-layout>
    @section('title', 'Empréstimo de Livro')
    <x-slot name="biblioteca">
        @yield('title')
    </x-slot>

    <div class="container-fluid px-4">
        <!-- Título da Página -->
        <h1 class="mt-4" style="font-size: 24px;">@yield('title')</h1>

        <!-- Caixa de pesquisa e botão de filtros -->
        <div class="p-3 rounded shadow mb-4" style="background-color: rgb(227, 224, 224);">
            <div class="d-flex align-items-center">
                <!-- Campo de pesquisa -->
                <div class="input-group" style="flex-grow: 1;">
                    <span class="input-group-text bg-white text-muted" style="border: 1px solid #ced4da;">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Pesquisar usuário" id="searchInput" 
                        onkeyup="searchUser()" 
                        onfocus="this.placeholder = ''" 
                        onblur="this.placeholder = 'Pesquisar usuário'" 
                        style="border: 1px solid #ced4da;">
                </div>
                <!-- Botão de filtros -->
                <button class="btn btn-dark ms-3" type="button" id="button-filter" data-bs-toggle="modal" data-bs-target="#filterModal" style="display: flex; align-items: center;">
                    <i class="fas fa-filter me-1"></i> Filtros
                </button>
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
                                <label for="id" class="form-label">ID</label>
                                <input type="number" class="form-control" id="id" placeholder="Ex: 2022106060020" min="1">
                            </div>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" placeholder="Ex: João da Silva">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary" onclick="applyFilters()">Aplicar Filtros</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulário de Empréstimo -->
        <div class="container mt-4">
            <div class="p-3 rounded shadow" style="background-color: rgb(227, 224, 224);">
                <form id="emprestimoForm" method="POST" action="{{ route('emprestimos.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <!-- Seleção de Usuário -->
                        <div class="col-md-6">
                            <label for="usuario" class="form-label">Usuário</label>
                            <select id="usuario" name="usuario_id" class="form-select" required>
                                <option value="">Selecione um usuário</option>
                                <!-- Opções de usuários serão carregadas dinamicamente -->
                            </select>
                        </div>
                        <!-- Campo Data de Empréstimo -->
                        <div class="col-md-6">
                            <label for="dataEmprestimo" class="form-label">Data de Empréstimo</label>
                            <input type="text" id="dataEmprestimo" name="data_emprestimo" class="form-control" 
                                placeholder="dd-mm-aaaa" maxlength="10" 
                                oninput="formatarData(this)" onchange="calcularDevolucao()" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <!-- Campo Data de Devolução -->
                        <div class="col-md-6">
                            <label for="dataDevolucao" class="form-label">Data de Devolução</label>
                            <input type="text" id="dataDevolucao" name="data_devolucao" class="form-control" readonly required />
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="cancelarFormulario()">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function searchUser() {
            const query = document.getElementById("searchInput").value;
            if (query.length > 2) {
                fetch(`/buscar-usuario?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        const selectUsuario = document.getElementById('usuario');
                        selectUsuario.innerHTML = "<option value=''>Selecione um usuário</option>";
                        data.forEach(user => {
                            const option = document.createElement('option');
                            option.value = user.id;
                            option.textContent = `${user.name} (ID: ${user.id})`;
                            selectUsuario.appendChild(option);
                        });
                    });
            }
        }

        function formatarData(input) {
            const value = input.value.replace(/\D/g, '');
            let formatado = '';
            if (value.length > 2) {
                formatado += value.substring(0, 2) + '-';
                if (value.length > 4) {
                    formatado += value.substring(2, 4) + '-';
                    formatado += value.substring(4, 8);
                } else {
                    formatado += value.substring(2);
                }
            } else {
                formatado = value;
            }
            input.value = formatado;
        }

        function calcularDevolucao() {
            const dataEmprestimoInput = document.getElementById('dataEmprestimo').value;
            const dataDevolucaoInput = document.getElementById('dataDevolucao');

            if (dataEmprestimoInput.length === 10) {
                const [dia, mes, ano] = dataEmprestimoInput.split('-').map(Number);

                const dataEmprestimo = new Date(ano, mes - 1, dia);
                dataEmprestimo.setDate(dataEmprestimo.getDate() + 15);

                const diaDevolucao = String(dataEmprestimo.getDate()).padStart(2, '0');
                const mesDevolucao = String(dataEmprestimo.getMonth() + 1).padStart(2, '0');
                const anoDevolucao = dataEmprestimo.getFullYear();

                dataDevolucaoInput.value = `${diaDevolucao}-${mesDevolucao}-${anoDevolucao}`;
            }
        }

        function cancelarFormulario() {
            document.getElementById('emprestimoForm').reset();
            alert('Formulário cancelado.');
        }

        function applyFilters() {
            const id = document.getElementById('id').value;
            const nome = document.getElementById('nome').value;

            console.log(`Aplicar filtros com ID: ${id}, Nome: ${nome}`);
        }
    </script>
    @endpush

    <style>
        .letter-link {
            transition: background-color 0.3s, color 0.3s;
        }
        .letter-link:hover {
            background-color: #d5d7da;
            border-radius: 5px;
            color: #000;
        }
        .input-group {
            flex-grow: 1;
            min-width: 300px;
        }
    </style>
</x-layout>
