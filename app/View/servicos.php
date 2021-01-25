<?php

require __DIR__ . '/../../vendor/autoload.php';
$page = "servicos";
use \App\Model\ProdutoServico;

$produtos = ProdutoServico::getProdutos();
$tipo = 2;
$tipoString = "serviço";

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listagem.php';
include __DIR__ . '/includes/footer.php';