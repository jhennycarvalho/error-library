<head>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <style>
        
        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            margin-bottom: 1rem; 
        }

        .circle {
            width: 120px; 
            height: 120px;
            border-radius: 50%;
            background-color: white; 
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px; 
        }

        .circle img {
            max-width: 110%; 
            max-height: 110%; 
        }

      
        .sb-sidenav-dark {
            background-color: #d5d7da; 
        }

       
        .sb-sidenav-menu .nav-link {
            color: #343a40;
            padding: 10px 15px; 
            display: block; 
        }

        .sb-sidenav-menu .nav-link:hover {
            background-color: #959799; 
            color: #ffffff; 
        }

        
        .nav-link:not(:last-child) {
            border-bottom: 1px solid #bbb; 
        }
    </style>
</head>

<body>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <br>
                        <!-- Logo em círculo acima do link Biblioteca -->
                        <div class="logo-container">
                            <div class="circle">
                                <img src="images/logo.png" alt="Logo">
                            </div>
                        </div>
                        <a class="nav-link" href="biblioteca" style="color: #343a40;">Empréstimo de livro</a>
                        <a class="nav-link" href="adicionarlivro" style="color: #343a40;">Adicionar Livro</a>
                        <a class="nav-link" href="cadastrarusuario" style="color: #343a40;">Cadastrar Usuário</a>
                        <div style="height: 2.5cm;"></div>
                        <a class="nav-link" href="/" style="color: #343a40;">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Sair
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                {{-- MAIN --}}
            </main>
        </div>
    </div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        @endpush
</body>