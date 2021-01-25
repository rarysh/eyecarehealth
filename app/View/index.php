<?php

use \App\Model\Vendedor;
if($_POST) {
    include('../Model/Vendedor.php');

    $usuario = new Vendedor();


    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);

    $user = $usuario->login($login, $senha);

    if($user == true) {
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
        header('location: home.php');
    } else {
        header('location:index.php?erro=senha');
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Avaliação Desenvolvedor fullstack</title>
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
        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            max-width: 600px;
            height: 320px;
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


<div id="login">
    <div class="container">
        <?php

        if(isset($_GET['erro'])) {
            echo '<div class="alert alert-danger">Dados de login incorretos</div>';
        }

        if(isset($_GET['success'])) {
            echo '<div class="alert alert-success">Logout efetuado com sucesso</div>';
        }

        ?>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="#" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="login" id="login" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="senha" id="senha" class="form-control">
                        </div>

                        <div class="form-group">
                            <br>
                            <input type="submit" name="logar" class="btn btn-info btn-md" value="Logar">
                        </div>
                        <div id="register-link" class="text-left">
                            <a href="cadastro.php" class="text-info">Cadastre-se</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
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
