<?php


if (($_GET['tipo']) == 1)
    $tipoString = "produto";
else
    $tipoString = "serviço";
define('TITLE','Cadastrar ' . $tipoString);

use \App\Model\ProdutoServico;
$obProduto = new ProdutoServico;

//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['preco'],$_POST['quantidade'])){

    $obProduto->nome    = $_POST['nome'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->quantidade     = $_POST['quantidade'];
    $obProduto->tipo     = ($_GET['tipo']);
    $obProduto->cadastrar();

    if ($obProduto->tipo == 1)
        $tipoLink = "produtos";
    else
        $tipoLink = "servicos";

    header('location: ' . $tipoLink . '.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';