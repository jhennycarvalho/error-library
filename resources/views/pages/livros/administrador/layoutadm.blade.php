<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'customtitle')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        /* Ajuste para o título "Adicionar Livro" com negrito menos intenso */
        h1 {
            font-weight: 600; /* Alterando de 'bold' para um peso mais leve */
            font-size: 28px;
        }

        /* Ajustes para os botões de navegação */
        .nav-button {
            font-weight: 600; /* Negrito moderado */
            color: #BBBBBB; /* Cor cinza quando não selecionado */
            border: none;
            text-decoration: none; /* Remove o estilo de hiperlink */
            padding-bottom: 5px;
            cursor: pointer;
        }

        .nav-button.active {
            color: #000000; /* Cor preta quando ativo */
            border-bottom: 2px solid #000; /* Linha preta quando selecionado */
            padding-bottom: 0px; /* Remove o efeito de "subida" */
        }

        /* Remove o comportamento de "link azul" */
        .nav-button:focus, .nav-button:active, .nav-button:hover {
            text-decoration: none;
            color: #000000; /* Cor preta ao focar/selecionar */
        }

        /* Cor preta do botão ativo e cinza do inativo */
        .nav-button:not(.active) {
            color: #BBBBBB; /* Cinza para o botão não ativo */
        }

        /* Remover o título "Livro" */
        #manual-section h2 {
            display: none; /* Oculta o título */
        }

        /* Estilos para o efeito de pull-up */
        .pull-up {
            margin-top: -10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 8px;
        }

        /* Ajustes para as colunas */
        .col-left, .col-right {
            padding: 20px;
        }

        /* Customização do botão */
        .custom-btn {
            width: 40%; /* Reduzindo o tamanho */
            margin-left: auto; /* Centraliza horizontalmente com ajuste à direita */
            margin-right: 0; /* Garantir que o botão fique à direita */
            background-color: #000; /* Fundo preto */
            color: white; /* Cor do texto branca */
        }

        /* Adiciona um efeito de hover para o botão */
        .custom-btn:hover {
            background-color: #333; /* Um tom mais claro de preto */
        }
    </style>

</head>


<body>
    @yield('content')
</body>

</x-layout>