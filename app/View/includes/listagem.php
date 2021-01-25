<?php

$mensagem = '';
if(isset($_GET['status'])){
    switch ($_GET['status']) {
        case 'success':
            $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
            break;

        case 'error':
            $mensagem = '<div class="alert alert-danger">Ação não executada!</div>';
            break;
    }
}
$resultados = '';
foreach($produtos as $produto) {
    if ($produto->tipo == $tipo)      {
        $resultados .= '<form method="post"><tr>
                      <td>' . $produto->id . '</td>
                      <td>' . $produto->nome . '</td>
                      <td>R$ ' . number_format((float)$produto->preco, 2, '.', '')
            . '</td>
                      <td>' . $produto->quantidade . '</td>' .
            ' <td> 
                      <input hidden id="produtoId" name="produtoId" value="' . $produto->id . '">
      <input type="number" class="form-control" id="qtdVender" name="qtdVender" placeholder="qtdVender">
    </td>
                      <td>
                        <a href="editar.php?id=' . $produto->id . '">
                          <button type="button" class="btn btn-primary">Editar</button>
                        </a>
                          <button type="submit"  class="btn btn-info">Vender</button>
                      </td>
                    </tr></form>';
    }
}
$resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhum ' . $tipoString . ' encontrado
                                                       </td>
                                                    </tr>';

?>
<main>

    <?=$mensagem?>

    <section>
        <a href="cadastrar.php?tipo=<?php echo $tipo ?>">
            <button class="btn btn-success">Novo  <?php echo $tipoString ?> </button>
        </a>
    </section>

    <section>

        <table class="table bg-light mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Quantidade a vender</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            <?=$resultados?>
            </tbody>
        </table>

    </section>


</main>