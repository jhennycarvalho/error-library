@extends('pages.livros.login.layoutlogin')
@section('title', 'Login')

@section('content')
<main class="form-signin">
    <div class="container-verde">
        <div class="logo-circulo">
            <img src="images/logo.png" alt="Logo EET"> <!-- Logo circular -->
        </div>
        
        <!-- Formulário de Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="mb-3">Biblioteca <br> EEEFM Estudo e Trabalho</h2>
            
            <!-- Campo E-mail -->
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="E-mail" required value="{{ old('email') }}">
                <label for="floatingInput">E-mail</label>
                
                <!-- Mensagem de erro para o campo e-mail -->
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo Senha -->
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Senha" required>
                <label for="floatingPassword">Senha</label>
                
                <!-- Mensagem de erro para o campo senha -->
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botão de Submit -->
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        </form>
    </div>
</main>

<footer>
    <div class="footer-line"></div>
    <p>Copyright © 2024 Todos os Direitos Reservados RO - Governo de Rondônia</p>
</footer>
@endsection

@section('scripts')
<script>
    // Adicionando interatividade nos inputs
    const inputs = document.querySelectorAll('.form-floating input');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            const label = this.nextElementSibling; // O label vem depois do input no HTML
            label.classList.add('active');
        });
        
        input.addEventListener('blur', function() {
            if (this.value === '') {
                const label = this.nextElementSibling;
                label.classList.remove('active');
            }
        });
    });
</script>
@endsection
