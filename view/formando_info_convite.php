<?php

require_once '../controller/IntegranteController.php';

use controller\IntegranteController;

$msg = '';

$idIntegrante = isset($_GET['idi']) ? $_GET['idi'] : '';
$target = isset($_GET['t']) ? $_GET['t'] : 'm';
$urlRetorno = '?p=' . $target . '&idi=' . $idIntegrante;

$informacoesConvite = NULL;

$integrante = new IntegranteController();
$res = $integrante->selecionar($idIntegrante);
if (is_string($res)) {
    $msg = $res;
} else {
    $informacoesConvite = $res['informacoes_convite'];
}
$informacoesConvite = strlen($informacoesConvite) < 1 ? 'Você ainda não definiu as Informações do Convite' : $informacoesConvite;
$informacoesConvite = str_replace(array("\r\n", "\r", "\n"), "<br>", $informacoesConvite);
?>

<input type="hidden" id="idIntegrante" value="<?= $idIntegrante ?>">

<div class="row">

    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-info-sign"></span> Informações Convite</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <button id="btn_info_edit" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
        </p>

        <blockquote>
            <?= $informacoesConvite ?>
        </blockquote>

    </div>
</div>
<script src="../view/formando_info_convite.js"></script>