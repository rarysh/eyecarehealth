<?php

require __DIR__ . '/../../vendor/autoload.php';
$page = "produtos";
use \App\Model\ProdutoServico;
use \App\Model\Venda;

$obVenda = new Venda;
$produtos = ProdutoServico::getProdutos();
$tipo = 1;
$tipoString = "produto";

//VALIDAÇÃO DO POST


include __DIR__ . '/includes/header.php';

if(isset($_POST['qtdVender'])){
    $obProduto = ProdutoServico::getProduto($_POST['produtoId']);
    if ($obProduto->quantidade >= $_POST['qtdVender'] && $_POST['qtdVender'] > 0){
        $obProduto->quantidade     = $obProduto->quantidade - $_POST['qtdVender'];
        $obProduto->atualizar();

        $obVenda->produtoId    = $_POST['produtoId'];
        $obVenda->vendedor    = $_SESSION['login'];
        $obVenda->servicoId    = null;
        $obVenda->quantidade     = $_POST['qtdVender'];
        $obVenda->preco     = $obProduto->preco;
        $obVenda->cadastrar();

        header('location: produtos.php?status=success');
        exit;
    }

    else{
        header('location: produtos.php?status=error');
        exit;
    }

}
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';