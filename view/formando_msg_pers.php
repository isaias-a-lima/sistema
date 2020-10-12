<?php

require_once '../controller/IntegranteController.php';

use controller\IntegranteController;

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
$mensagemPersonalizada = strlen($mensagemPersonalizada) < 1 ? 'Você ainda não definiu a sua Mensagem Personalizada' : $mensagemPersonalizada;
$mensagemPersonalizada = str_replace(array("\r\n", "\r", "\n"), "<br>", $mensagemPersonalizada);
?>

<input type="hidden" id="idIntegrante" value="<?= $idIntegrante ?>">

<div class="row">

    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-pencil"></span> Mensagem Personalizada</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <button id="btn_fmp_ed" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
        </p>

        <blockquote>
            <?= $mensagemPersonalizada ?>
        </blockquote>

    </div>
</div>
<script src="../view/formando_msg_pers.js"></script>