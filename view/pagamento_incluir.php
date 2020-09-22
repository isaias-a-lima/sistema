<?php

require_once '../controller/PagamentoController.php';
require_once '../dto/PagamentoDto.php';
require_once '../controller/ComissaoController.php';

use controller\ComissaoController;
use controller\PagamentoController;
use dto\PagamentoDto;

$idComissao = isset($_GET['ic']) ? $_GET['ic'] : '';
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : '';
$idFuncionario = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : '';
$target = isset($_GET['t']) ? $_GET['t'] : '';
$urlRetorno = '?p=' . $target . '&ic=' . $idComissao . '&id=' . $idIntegrante;
$msg = '';

$comissao = new ComissaoController();
$dataVencimento = null;
$res = $comissao->selecionar($idComissao);
if(is_string($res)){
    $msg = $res;
}else{
    $dataVencimento = date('Y-m-d',strtotime($res['data_prevista_entrega'] . '- 1 week'));
    $dataVencimento = strtotime($dataVencimento) > strtotime('now') ? $dataVencimento : 0 ;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pgt = new PagamentoController();
    $dto = new PagamentoDto($_POST);
    $res = $pgt->incluir($dto);
    if(is_string($res)){
        $msg = $res;
    }else if(is_numeric($res)){
        echo "<script>setTimeout(function(){window.location.href='../view/$urlRetorno'},2000)</script>";
        $msg = '<div class="alert alert-danger">Pagamento incluído com sucesso!</div>';
    }
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-usd"></span> Incluir Pagamento</h2>        

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form method="POST" accept-charset="utf-8">

            <input type="hidden" name="idIntegrante" value="<?=$idIntegrante?>">
                
            <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control" name="descricao"></textarea>
                </div>

                <div class="form-group">
                    <label>Valor R$</label>
                    <input type="number" step="0.01" class="form-control" name="valor" required>
                </div>

                <div class="form-group">
                    <label>Forma de pagamento</label>
                    <select class="form-control" name="formaPagamento" required>
                        <option value="">Escolha...</option>
                        <option value="Débito">Débito</option>
                        <option value="Crédito">Crédito</option>
                        <option value="Boleto">Boleto</option>
                        <option value="Depósito">Depósito</option>
                        <option value="Dinheiro">Dinheiro</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Data vencimento</label>
                    <input type="date" class="form-control" name="dataVencimento" value="<?=$dataVencimento?>" required>
                </div>

                <div class="form-group">
                    <label>Data pagamento</label>
                    <input type="date" class="form-control" name="dataPagamento">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="statusPagamento">
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