<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.template.head')
    <style>
        body {
            overflow: hidden; /* Impede que a barra de rolagem apareça na janela principal */
        }

        #layoutSidenav {
            display: flex;
            height: 100vh; /* Faz com que o layout ocupe a altura total da tela */
        }

        #layoutSidenav_nav {
            height: 100vh; /* Garante que a sidebar ocupe a altura total da tela */
            overflow-y: auto; /* Permite rolagem na sidebar, se necessário */
        }

        #layoutSidenav_content {
            flex: 1; /* O conteúdo principal ocupa o restante do espaço */
            overflow-y: auto; /* Permite rolagem no conteúdo principal */
            padding: 20px; /* Adiciona um espaçamento */
        }

        .navbar {
            position: fixed; /* Faz a navbar ficar fixa na parte superior */
            width: 100%; /* Garante que a navbar ocupe toda a largura */
            z-index: 1000; /* Garante que a navbar fique acima do conteúdo */
        }

        #layoutSidenav_content {
            margin-top: 56px; /* Adiciona espaço para a navbar fixada (ajuste conforme a altura da navbar) */
        }
    </style>
</head>
<body>
    <!-- Navbar no topo -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="d-flex align-items-center m-3">
            <button class="btn btn-link btn-sm me-1" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.html" style="font-size: 1.0rem;">
                BIBLIOTECA ESTUDO E TRABALHO
            </a>
        </div>

        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" style="border-radius: 50px; padding: 0.375rem 1.5rem; width: 4cm;" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuário
                    <i class="fas fa-user fa-fw ms-2"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('layouts.template.sidebar')
        </div>

        <div id="layoutSidenav_content">
            <main>
                {{ $slot }}
            </main>
            <footer class="py-4 bg-light mt-auto">
                @include('layouts.template.footer')
            </footer>
        </div>
    </div>

    @stack('scripts')

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const layoutSidenav = document.getElementById('layoutSidenav_nav');

            sidebarToggle.addEventListener('click', function (e) {
                e.preventDefault();
                layoutSidenav.classList.toggle('collapsed');
            });
        });
    </script>
    <script src="js/scripts.js"></script>
    @endpush
</body>
</html>
