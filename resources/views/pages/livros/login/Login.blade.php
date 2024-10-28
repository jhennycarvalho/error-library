@extends('pages.livros.login.layoutlogin')
@section('title', 'Login')
@section('content')

<main class="form-signin">
    <div class="container-verde">
        <div class="logo-circulo">
            <img src="images/logo.png" alt="Logo EET"> <!-- Substitua pelo caminho correto da imagem -->
        </div>
        <form>
            <h1 class="mb-3 fw-normal">Biblioteca</h1>
            <h1 class="mb-3 fw-normal">EEEFM Estudo e Trabalho</h1>
            <div class="form-floating">
                <div class="input-label">E-mail</div> <!-- Texto para o email -->
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            </div>
            <div class="form-floating">
                <div class="input-label">Senha</div> <!-- Texto para a senha -->
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
        </form>
    </div>
</main>
<footer>
    <div class="footer-line"></div> <!-- Linha branca fina -->
    <p>Copyright © 2024 Todos os Direitos Reservados RO - Governo de Rondônia</p>
</footer>


@endsection