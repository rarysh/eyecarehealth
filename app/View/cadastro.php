<?php

use \App\Model\Vendedor;

if(isset($_POST['cadastrar'])) {
    include('/../Control/Database.php');

    $cadastrar = new Vendedor();

    $login = trim(strip_tags($_POST['username'])); // atribui login à variavel, com funções contra sql inject
    $senha = trim(strip_tags($_POST['senha'])); // atribui login à variavel, com funções contra sql inject
    $rep_senha = trim(strip_tags($_POST['rep_senha'])); // atribui login à variavel, com funções contra sql inject
    $nome = trim(strip_tags($_POST['nome'])); // atribui login à variavel, com funções contra sql inject
    // confere se as senhas são iguais
    if($senha === $rep_senha) {
        $consulta = $cadastrar->unico($login);
        // caso o login escolhido já exista no banco retorna erro
        if($consulta == false) {
            header('location:cadastro.php?repetido=senha');
            // caso não haja login parecido, inclui métoro de inserção de dados no banco de dados
        } else {
            $insere = $cadastrar->cadastra($login,$senha, $nome);
            // caso o usuario seja cadastrado, exibir mensagem de sucesso
            if($insere == true) {
                header('location:cadastro.php?success=cadastrado');
            }
        }

    } else {
        header('location:cadastro.php?erro=senha');
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login PHP OO</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src = "http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }
        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }
    </style>
</head>
<body>
<div class="container">

    <?php
    // mensagem de erro caso as senhas não sejam iguais
    if(isset($_GET['erro'])) {
        echo '<div class="alert alert-danger">As senhas devem ser iguais!</div>';
    }
    // mensagem de erro caso o login escolhido já exista no banco de dados
    if(isset($_GET['repetido'])) {
        echo '<div class="alert alert-danger">Este Login já foi escolhido por outra pessoa!</div>';
    }
    // mensagem de sucesso caso o usuario seja cadastrado corretamente
    if(isset($_GET['success'])) {
        echo '<div class="alert alert-success">Usuario cadastrado!</div>';
    }

    ?>

    <form id="cadastro-form" class="form" action="#" method="post">
        <h3 class="text-center text-info">Cadastro</h3>
        <div class="form-group">
            <label for="nome" class="text-info">Nome completo:</label><br>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="username" class="text-info">Nome de usuário:</label><br>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha" class="text-info">Senha:</label><br>
            <input type="text" name="senha" id="senha" class="form-control">
        </div>
        <div class="form-group">
            <label for="rep_senha" class="text-info">Repita a senha:</label><br>
            <input type="text" name="rep_senha" id="rep_senha" class="form-control">
        </div>

        <div class="form-group">
            <br>
            <input type="submit" name="cadastrar" class="btn btn-info btn-md" value="Cadastrar">
        </div>
    </form>
    <div class="text-right">
        <a href="home.php">Voltar</a></div>
</div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    setTimeout(function() {
        $('.alert').fadeOut();
    }, 3000);

</script>
</body>

</html>
