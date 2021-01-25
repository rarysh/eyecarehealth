<?php

session_start();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="jquery-3.5.1.min.js"></script>
    <title>Avaliação Desenvolvedor fullstack</title>
</head>
<body class="bg-light">


<nav class="navbar bg-dark navbar-dark navbar-expand-lg navbar-light bg-light mb-3">
    <a class="navbar-brand" href="#">Avaliação Desenvolvedor fullstack</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if($page=="home") { ?>  active   <?php   }  ?>">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item<?php if($page=="produtos") { ?>  active   <?php   }  ?>">
                <a class="nav-link" href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item<?php if($page=="servicos") { ?>  active   <?php   }  ?>">
                <a class="nav-link" href="servicos.php">Serviços</a>
            </li>
            <li class="nav-item<?php if($page=="vendas") { ?>  active   <?php   }  ?>">
                <a class="nav-link" href="vendas.php">Vendas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
