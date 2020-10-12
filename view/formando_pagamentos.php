<?php

require_once '../controller/PagamentoController.php';
require_once '../dto/PagamentoDto.php';

use controller\PagamentoController;

$idIntegrante = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : NULL ;
$target = isset($_GET['t']) ? $_GET['t'] : 'm';
$urlRetorno = '?p=' . $target;
$msg = NULL;

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-usd"></span> Pagamentos</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>        

        <table class="table">
            <tr>
                <th>Status</th>
                <th>Vencimento</th>
                <th>Forma de Pgto.</th>                
                <th>Valor</th>                
            </tr>

            <?php
            $pgt = new PagamentoController();
            $res = $pgt->selecionarPorIntegrante($idIntegrante);
            if (is_string($res)) {
                echo $res;
            } else {

                while ($row = $res->fetch_assoc()) {
                    $valor = number_format($row['valor'], 2, ",", ".");
                    $statusPagamento = $row['status_pagamento'];
                    $vencimento = date('d/m/Y',strtotime($row['data_vencimento']));
                    $idPagamento = $row['id'];
                    $classLinha = '';
                    switch ($statusPagamento) {
                        case 'Pendente':
                            $classLinha = 'warning';
                            break;
                        case 'Pago':
                            $classLinha = 'success';
                            break;
                        case 'Vencido':
                            $classLinha = 'danger';
                            break;
                    }
                    echo "<tr class='$classLinha'>";
                    echo '<td>' . $statusPagamento . '</td>';
                    echo '<td>' . $vencimento . '</td>';
                    echo '<td>' . $row['forma_pagamento'] . '</td>';
                    echo '<td>R$ ' . $valor . '</td>';                    
                    echo '</tr>';
                }
            }
            ?>

        </table>

    </div>
</div>