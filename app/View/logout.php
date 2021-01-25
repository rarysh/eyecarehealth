<?php


include('../Model/Vendedor.php');

use \App\Model\Vendedor;

$usuario = new Vendedor();

$logout = $usuario->logout();

?>
