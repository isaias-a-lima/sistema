<?php

require_once '../controller/IntegranteController.php';

use controller\IntegranteController;
use dto\IntegranteDto;

$msg = '';

$idIntegrante = isset($_GET['idi']) ? $_GET['idi'] : '';
$target = isset($_GET['t']) ? $_GET['t'] : 'm';
$urlRetorno = '?p=' . $target . '&idi=' . $idIntegrante;

$mensagemPersonalizada = NULL;

$integrante = new IntegranteController();
$res = $integrante->selecionar($idIntegrante);
if (is_string($res)) {
    $msg = $res;
} else {
    $mensagemPersonalizada = $res['mensagem_personalizada'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){    
    $res2 = $integrante->editarMensagemPersonalizada($_POST['idIntegrante'],$_POST['mensagemPersonalizada']);
    if(is_string($res2)){
        $msg = $res2;
    }else{
        echo '<script>setTimeout(function(){window.location.href="../view/'. $urlRetorno .'"},2000)</script>';
        $msg = '<div class="alert alert-danger">Mensagem Personalizada editada com sucesso!</div>';
    }
}
?>

<input type="hidden" id="idIntegrante" value="<?= $idIntegrante ?>">

<div class="row">

    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-info-sign"></span> Editar Mensagem Personalizada</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form method="POST" accept-charset="utf-8">

                <input type="hidden" name="idIntegrante" value="<?=$idIntegrante?>">

                <div class="form-group">
                    <textarea class="form-control" id="mensagemPersonalizada" name="mensagemPersonalizada" rows="6"><?= $mensagemPersonalizada ?></textarea>
                </div>
                <button class="btn btn-danger">Salvar</button>

            </form>
        </p>

    </div>
</div>