<?php
$msg = '';
date_default_timezone_set('America/Sao_Paulo');
$dataHora = Date('Y-m-d H:i:s');

$idComissao = isset($_GET['ic']) ? $_GET['ic'] : '';
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : '';
$idFuncionario = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : '';
$nomeFuncionario = $_SESSION['nomeSession'];

$target = isset($_GET['t']) ? $_GET['t'] : '';
$urlRetorno = '?p=' . $target . '&ic=' . $idComissao . '&id=' . $idIntegrante;

require_once '../util/Arquivo.php';
require_once '../dto/LinkDto.php';
require_once '../controller/LinkController.php';

use controller\LinkController;
use dto\LinkDto;

if (isset($_POST['descricao'])) {

    $dto = new LinkDto($_POST);
    $dto->setArquivo($_FILES['arquivo']);

    $controller = new LinkController();
    $res = $controller->incluirLinkParaComissao($dto);

    if(is_string($res)){
        $msg = $res;
    }
    if(is_numeric($res) && $res == 1){
        $msg = '<div class="alert alert-danger">Link gerado com sucesso!</div>';
        echo '<script>setTimeout(function(){window.location.href="../view/'. $urlRetorno .'"},2000)</script>';
    }else if(is_numeric($res) && $res == 2){
        $msg = '<div class="alert alert-danger">Link gerado com sucesso!<br>Foi enviado um e-mail aos formandos!</div>';
        echo '<script>setTimeout(function(){window.location.href="../view/'. $urlRetorno .'"},2000)</script>';
    }
}

?>
<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-link"></span> Enviar Link à Comissão</h2>
        <h4>ID Comissão: <?=$idComissao?></h4>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form method="POST" accept-charset="utf-8" enctype="multipart/form-data">

                <input type="hidden" name="idFuncionario" value="<?=$idFuncionario?>">
                <input type="hidden" name="idComissao" value="<?=$idComissao?>">
                <input type="hidden" name="idIntegrante" value="0">
                <input type="hidden" name="dataEnvio" value="<?=$dataHora?>">
                <input type="hidden" name="nomeIntegrante" value="">
                <input type="hidden" name="emailIntegrante" value="">
                <input type="hidden" name="nomeFuncionario" value="<?=$nomeFuncionario?>">


                <div class="form-group">
                    <label>Arquivo</label>
                    <input type="file" name="arquivo" id="arquivo" class="form-control">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" id="descricao" rows="3" class="form-control"></textarea>
                </div>

                <button class="btn btn-danger">Enviar</button>
            </form>
        </p>

    </div>
</div>
<script src="../view/comissao_enviar_link.js"></script>