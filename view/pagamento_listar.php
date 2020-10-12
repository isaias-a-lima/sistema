<?php

require_once '../controller/PagamentoController.php';
require_once '../dto/PagamentoDto.php';

use controller\PagamentoController;
use dto\PagamentoDto;

$idComissao = isset($_GET['ic']) ? $_GET['ic'] : '';
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : '';
$idFuncionario = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : '';
$target = isset($_GET['t']) ? $_GET['t'] : 'm';
$urlRetorno = '?p=' . $target . '&ic=' . $idComissao . '&id=' . $idIntegrante;
$msg = '';

date_default_timezone_set("America/Sao_Paulo");
$dtVencInicio = isset($_POST['dtVencInicio']) ? $_POST['dtVencInicio'] : date('Y-m-d', strtotime('1 month ago'));
$dtVencInicio = !empty($dtVencInicio) ? $dtVencInicio : date('Y-m-d', strtotime('1 month ago'));
$dtVencFim = isset($_POST['dtVencFim']) ? $_POST['dtVencFim'] : date('Y-m-d', strtotime('+ 1 month'));
$dtVencFim = !empty($dtVencFim) ? $dtVencFim : date('Y-m-d', strtotime('+ 1 month'));
$statusPagamento = isset($_POST['statusPagamento']) ? $_POST['statusPagamento'] : '%';
$dtInicio = date('d/m/Y', strtotime($dtVencInicio));
$dtFim = date('d/m/Y', strtotime($dtVencFim));
$status = $statusPagamento == '%' ? 'Todos' : $statusPagamento;

if (isset($_POST['dtVencInicio'])) {
    $msg = "<div class='alert alert-danger'><b>PESQUISA</b><br><b>Início:</b> $dtInicio <b>Fim:</b> $dtFim <b>Status:</b> $status</div>";
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-usd"></span> Pagamentos</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form class="form-inline" method="POST" accept-charset="utf-8">
                <div class="info">
                    <input type="date" name="dtVencInicio" class="form-control" placeholder="Data Venc. Início">
                    <div class="info-into">Data vencimento Início</div>
                </div>
                <div class="info">
                    <input type="date" name="dtVencFim" class="form-control" placeholder="Data Venc. Fim">
                    <div class="info-into">Data vencimento Fim</div>
                </div>
                <div class="info">
                    <select name="statusPagamento" class="form-control">
                        <option value="%">Todos</option>
                        <option value="Pendente">Pendentes</option>
                        <option value="Vencido">Vencidos</option>
                        <option value="Pago">Pagos</option>
                    </select>
                    <div class="info-into">Status</div>
                </div>
                <button class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </p>

        <table class="table">
            <tr>
                <th>Status</th>
                <th>Vencimento</th>
                <th>Forma de Pgto.</th>                
                <th>Valor</th>
                <th>&nbsp;</th>
            </tr>

            <?php
            $pgt = new PagamentoController();
            $res = $pgt->listar($dtVencInicio, $dtVencFim, $statusPagamento);
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
                    echo '<td><a href="#" onclick="exibirIntegrante(' . $row['id_integrante'] . ',' . $row['id_comissao'] . ')"><span class="glyphicon glyphicon-user"></span></a></td>';                    
                    echo '</tr>';
                }
            }
            ?>

        </table>

    </div>
</div>
<script src="../view/pagamento_listar.js"></script>