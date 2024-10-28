
    @extends('pages.livros.administrador.layoutadm')
    @section('title', 'Cadastrar Usuario')
    <x-slot name="Cadastrar Usuario">
        @yield('title')
    </x-slot> 
    @section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Caixa de pull-up -->
                <div class="pull-up">
                    <hr>
                    <h1 class="text-left">Cadastrar Usuário</h1>
                    <!-- Dividindo o formulário em duas colunas -->
                    <form action="{{ route('usuarios.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Coluna Esquerda -->
                            <div class="col-md-6 col-left">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>

                                <div class="mb-3">
                                    <label for="num_matricula" class="form-label">Número de Matrícula</label>
                                    <input type="number" class="form-control" id="num_matricula" name="num_matricula" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="senha" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="senha" name="senha" required>
                                </div>
                            </div>

                            <!-- Coluna Direita -->
                            <div class="col-md-6 col-right">
                                <div class="mb-3">
                                    <label for="serie" class="form-label">Série</label>
                                    <input type="text" class="form-control" id="serie" name="serie" required>
                                </div>

                                <div class="mb-3">
                                    <label for="turma" class="form-label">Turma</label>
                                    <input type="text" class="form-control" id="turma" name="turma" required>
                                </div>

                                <div class="mb-3">
                                    <label for="turno" class="form-label">Turno</label>
                                    <input type="text" class="form-control" id="turno" name="turno" required>
                                </div>

                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" required>
                                </div>

                                <div class="mb-3">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" required>
                                </div>
                            </div>
                        </div>

                        <!-- Botão de Cadastrar -->
                        <div class="text-left mt-4">
                            <button type="submit" class="btn custom-btn">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
@endpush

@endsection
