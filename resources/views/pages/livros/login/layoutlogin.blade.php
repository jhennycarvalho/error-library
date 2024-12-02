<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title', 'Login')</title>

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
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 100vh;
            font-family: 'Arial', sans-serif; /* Definir uma fonte mais moderna */
        }
    
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            padding: 20px;
        }
    
        .container-verde {
            background-color: rgba(0, 0, 0, 0.7); /* Preto com mais opacidade */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 450px;
            color: white;
            position: relative;
            text-align: center;
        }
    
        .logo-circulo {
            width: 120px; /* Reduzindo o tamanho */
            height: 120px;
            background-color: #e5dbdb;
            border-radius: 50%;
            position: absolute;
            top: -75px; /* Aumentando a distância da logo */
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    
        .logo-circulo img {
            width: 80%;
            height: auto;
        }
    
        h2 {
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 50px; /* Aumentando o espaço entre a logo e o título */
            text-transform: uppercase; /* Título mais chamativo */
        }
    
        .form-floating {
            margin-bottom: 20px;
            position: relative; /* Ajuste de posição do label */
        }
    
        .form-floating input {
            height: 40px; /* Altura mais confortável para os inputs */
            padding: 10px;
            box-sizing: border-box;
            font-size: 1rem;
            text-align: left;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: #fff; /* Cor de fundo clara para os inputs */
        }
    
        .form-floating input:focus {
            border-color: #717277; /* Cor da borda quando em foco */
            box-shadow: 0 0 0 0.2rem rgba(113, 114, 119, 0.25); /* Efeito sutil de foco */
        }
    
        label {
            position: absolute;
            top: 10px; /* Posição inicial do label */
            left: 10px;
            font-size: 1rem;
            color: #bbb; /* Cor do label */
            transition: all 0.3s ease; /* Suaviza o movimento do label */
        }
    
        .w-100.btn.btn-lg.btn-primary {
            background-color: #717277; /* Cor de fundo cinza */
            border-color: #717277;
            border-radius: 5px; /* Cantos arredondados */
            padding: 10px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease; /* Transição suave ao passar o mouse */
        }
    
        .w-100.btn.btn-lg.btn-primary:hover {
            background-color: #4e4e4e; /* Azul suave ao passar o mouse */
            border-color: #4e4e4e;
        }
    
        footer {
            text-align: center;
            font-size: 0.9rem;
            font-family: "New Century Schoolbook", "TeX Gyre Schola", serif;
            color: white;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 10px;
        }
    
        .footer-line {
            border-top: 1px solid white;
            width: 80%;
            margin: 10px auto;
        }
    </style>
    
    

    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @yield('content')
</body>
</html>
