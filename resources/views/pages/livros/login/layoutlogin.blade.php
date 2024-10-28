<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title', 'customtitle')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    
    <style>
        /* Estilos personalizados */
        body {
            background-image: url("images/fundolivro.jpeg"); /* Substitua pelo caminho da sua imagem */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0; /* Remove margens do body */
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Faz o body ocupar a altura total da viewport */
        }

        main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            flex-grow: 1; /* Faz o main crescer para ocupar o espaço disponível */
        }

        .container-verde {
            background-color: rgba(0, 0, 0, 0.5); /* Preto com 50% de opacidade */
            padding: 20px;
            padding-top: 80px; /* Ajuste para subir os elementos */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px; /* Reduz o tamanho máximo do container */
            margin: 20px auto;
            color: white;
            min-height: 480px; /* Ajuste de altura para centralização */
            position: relative;
        }

        .logo-circulo {
            width: 150px; /* Tamanho do círculo */
            height: 150px;
            background-color: rgb(229, 219, 219); /* Cor de fundo cinza */
            border-radius: 50%;
            position: absolute;
            top: -75px; /* Ajuste para subir o círculo */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-circulo img {
            width: 100%;
            height: auto;
        }

        .form-floating {
            margin-bottom: 15px; /* Espaçamento entre os campos */
        }

        
        .form-control {
            height: 10px; /* Ajusta a altura para afinar o input */
            padding: 2px 10px; /* Reduz o padding para afinar os campos de texto */
            box-sizing: border-box; /* Garante que o padding esteja incluído na altura e largura do campo */
            font-size: 1rem;
            text-align: left; /* Alinha o texto à esquerda */
        }

        .w-100.btn.btn-lg.btn-primary {
            margin-top: 20px; /* Espaçamento acima do botão */
            background-color: #717277;
            border-color: #717277;
        }

        .input-label {
            color: white; /* Cor do texto */
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif; /* A mesma fonte do título */
            font-size: 1rem; /* Tamanho menor */
            margin-bottom: 5px; /* Espaçamento abaixo do texto */
            text-align: left; /* Alinhamento à esquerda */
        }

        /* Título com a nova fonte */
        h1 {
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif;
            font-size: 2.2rem; /* Tamanho do título */
            text-align: center; /* Centraliza o título */
        }

        footer {
            text-align: center; /* Centraliza o texto */
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif; /* A mesma fonte do título */
            color: white; /* Cor do texto do footer */
            background-color: rgba(0, 0, 0, 0.5); /* Fundo preto com 60% de opacidade */
            position: relative; /* Para posicionar corretamente a linha */
            margin-top: -40px; /* Espaço acima do footer */
            padding: 10px 0; /* Espaçamento interno do footer */
        }

        .footer-line {
            border-top: 1px solid white; /* Linha branca fina */
            width: 90%; /* Largura da linha */
            margin: 0 auto; /* Centraliza a linha */
            margin-bottom: 5px; /* Espaço abaixo da linha */
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
@yield('content')
</body>

</html>