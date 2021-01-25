<?php

require __DIR__ . '/../../vendor/autoload.php';
$page = "vendas";
use \App\Model\ProdutoServico;
use \App\Model\Venda;

include __DIR__ . '/includes/header.php';
$vendas = Venda::getVendas($_SESSION['login']);
$vendedor = \App\Model\Vendedor::getVendedor($_SESSION['login']);

//VALIDAÇÃO DO POST


include __DIR__ . '/includes/listagemvendas.php';
include __DIR__ . '/includes/footer.php';