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
foreach($vendas as $venda) {
    $resultados .= '<tr>
                      <td>' . $venda->id . '</td>
                      <td>' . $venda->vendedor . '</td>
                      <td>' . $venda->produtoId . '</td>
                      <td>' . $venda->servicoId . '</td>
                      <td>R$ '  . number_format((float)$venda->preco, 2, '.', '') .' </td>
                      <td>' . $venda->quantidade . '</td>
                      <td>' . $venda->data . '</td>' .              '
                                            <span class="d-none total">R$ '  . number_format((float)$venda->getTotal(), 2, '.', '') .'</span>' .'

                      <td><span class="comission">R$ '  . number_format((float)$venda->getComissao(), 2, '.', '') .'</span></td>' .
        ' <td> 
    </td>
                    </tr>';
}
$resultados = strlen($resultados) ? $resultados : '<tr>
                                                       <td colspan="6" class="text-center">
                                                              Nenhuma venda encontrada
                                                       </td>
                                                    </tr>';

?>
<main>

    <?=$mensagem?>


    <section>
    <h2>Listagem de vendas do último mês feitas por você</h2>
        <table class="table bg-light mt-3">
            <thead>
            <tr>
                <th>ID</th>
                <th>Vendedor</th>
                <th>ID do produto</th>
                <th>ID do serviço</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Data</th>
                <th>Comissão</th>
            </tr>
            </thead>
            <tbody>
            <?=$resultados?>
            </tbody>
        </table>
        <hr>
        <h2>Comissão</h2>
        <p>Data de Contratação: <?php echo $vendedor->dataInicio; ?> </p>
        <p>Comissão total: <span class="totalcomission"></span></p>
        <p>Bônus: <span class="bonus"><?php echo $vendedor->getBonus($vendedor->dataInicio, sizeof($vendas)); ?></span> *  <span class="totalsell"></span> =  <b><span class="totalbonus"></span></b></p>
        <p><b>TOTAL: <span class="totaltotal"></span></b></p>

    </section>
    <script>

        window.onload = function()
        {
            sum = 0;
            $('.comission').each(function (){
                sum += parseFloat($(this).first().html().slice(3));
            });
            totalcomission = sum;
            $('.totalcomission').html('R$ ' + totalcomission);
            sum = 0;
            $('.total').each(function (){
                sum += parseFloat($(this).first().html().slice(3));
            });
            $('.totalsell').html('R$ ' + sum);
            totalbonus=sum * $('.bonus').html();
            totaltotal= totalbonus + totalcomission;
            $('.totalbonus').html('R$ ' + totalbonus);
            $('.totaltotal').html('R$ ' + totaltotal);
        };

    </script>

</main>