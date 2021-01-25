<?php



use \App\Model\ProdutoServico;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: home.php?status=error');
  exit;
}

$obProduto = \App\Model\ProdutoServico::getProduto($_GET['id']);
if ($obProduto->tipo == 1)
    $tipoString = "produto";
else
    $tipoString = "serviço";
define('TITLE','Editar ' . $tipoString);

if(!$obProduto instanceof \App\Model\ProdutoServico){
  header('location: home.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['nome'],$_POST['preco'],$_POST['quantidade'])){

    $obProduto->nome    = $_POST['nome'];
    $obProduto->preco = $_POST['preco'];
    $obProduto->quantidade     = $_POST['quantidade'];
    $obProduto->atualizar();

    if ($obProduto->tipo == 1)
        header('location: produtos.php?status=success');
    else
        header('location: servicos.php?status=success');
  exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';