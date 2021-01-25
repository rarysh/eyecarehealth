<?php

require __DIR__ . '/../../vendor/autoload.php';
$page = "home";

include __DIR__ . '/includes/header.php';
?>

    <h2>Olá <?php echo $_SESSION['login']; ?>!</h2>
    <p> O que deseja fazer?</p>
    <div class="row">
        <div class="col-sm-12 col-md-4">

            <a class="nav-link" href="produtos.php">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Vender produtos</h5>
                        <p class="card-text">Realizar a venda de produtos</p>
                    </div>
                </div></a>
        </div>
        <div class="col-sm-12 col-md-4">
            <a class="nav-link" href="servicos.php">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Vender serviços</h5>
                        <p class="card-text">Realizar a venda de serviços</p>
                    </div>
                </div></a>
        </div>
        <div class="col-sm-12 col-md-4">
            <a class="nav-link" href="vendas.php">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Ver vendas</h5>
                        <p class="card-text">Ver vendas realizadas por você</p>
                    </div>
                </div></a>
        </div>
    </div>
<?php
include __DIR__ . '/includes/footer.php';