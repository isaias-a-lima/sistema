<?php

require_once '../controller/PagamentoController.php';
require_once '../dto/PagamentoDto.php';

use controller\PagamentoController;
use dto\PagamentoDto;

$idPagamento = isset($_GET['ip']) ? $_GET['ip'] : '';
$idFuncionario = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : '';
$target = isset($_GET['t']) ? $_GET['t'] : '';

$msg = '';

$idIntegrante = $descricao = $valor = $formaPagamento = NULL;
$dataVencimento = $dataPagamento = $statusPagamento = $idComissao = NULL;

$pgt = new PagamentoController();
$res = $pgt->selecionar($idPagamento);

if (is_string($res)) {
    $msg = $res;
} else {
    if($res->num_rows > 0){
        $row = $res->fetch_array();    
        $idPagamento = $row['id'];
        $idIntegrante = $row['id_integrante'];
        $descricao = $row['descricao'];
        $valor = $row['valor'];
        $formaPagamento = $row['forma_pagamento'];
        $dataVencimento = $row['data_vencimento'];
        $dataPagamento = $row['data_pagamento'];
        $statusPagamento = $row['status_pagamento'];
        $idComissao = $row['id_comissao'];
    }   
}

$urlRetorno = '?p=' . $target . '&ic=' . $idComissao . '&id=' . $idIntegrante;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dto = new PagamentoDto($_POST);
    $res = $pgt->editar($dto);
    if (is_string($res)) {
        $msg = $res;
    } else if (is_numeric($res)) {
        echo "<script>setTimeout(function(){window.location.href='../view/$urlRetorno'},2000)</script>";
        $msg = '<div class="alert alert-danger">Pagamento editado com sucesso!</div>';
    }    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-usd"></span> Editar Pagamento</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form method="POST" accept-charset="utf-8">

                <input type="hidden" name="id" value="<?= $idPagamento ?>">
                <input type="hidden" name="ip" value="<?= $idPagamento ?>">

                <input type="hidden" name="idIntegrante" value="<?= $idIntegrante ?>">

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao"><?= $descricao ?></textarea>
                </div>

                <div class="form-group">
                    <label>Valor R$</label>
                    <input type="number" step="0.01" class="form-control" name="valor" required value="<?= $valor ?>">
                </div>

                <div class="form-group">
                    <label>Forma de pagamento</label>
                    <select class="form-control" name="formaPagamento" required>
                        <option value="<?= $formaPagamento ?>"><?= $formaPagamento ?></option>
                        <option value="Débito">Débito</option>
                        <option value="Crédito">Crédito</option>
                        <option value="Boleto">Boleto</option>
                        <option value="Depósito">Depósito</option>
                        <option value="Dinheiro">Dinheiro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data vencimento</label>
                    <input type="date" class="form-control" name="dataVencimento" value="<?= $dataVencimento ?>" required>
                </div>

                <div class="form-group">
                    <label>Data pagamento</label>
                    <input type="date" class="form-control" name="dataPagamento" value="<?= $dataPagamento ?>">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="statusPagamento">
                        <option value="<?=$statusPagamento?>"><?=$statusPagamento?></option>
                        <option value="Pendente">Pendente</option>
                        <option value="Pago">Pago</option>
                        <option value="Vencido">Vencido</option>
                    </select>
                </div>

                <button class="btn btn-danger">Salvar</button>
            </form>
        </p>

    </div>
</div>