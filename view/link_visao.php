<?php

require_once '../controller/LinkController.php';
require_once '../controller/EmpresaController.php';

use controller\EmpresaController;
use controller\LinkController;

$msg = '';
$urlRetorno = '';
$idLink = isset($_GET['idl']) ? $_GET['idl'] : 0;
$empresa = EmpresaController::exibirEmpresa();
$urlSistema = $empresa->getUrlSistema();
$linksDir = $empresa->getLinksDir();

$controller = new LinkController();
$link = $controller->selecionar($idLink);
if(is_string($link)){
    $msg = $link;
}

$urlRetorno = '?p=ivis&id=' . $link['id_integrante'] . '&ic=' . $link['id_comissao'];

$descricao = str_replace(array("\r\n","\n","\r"),"<br>",$link['descricao']);
$dataEnvio = date('d/m/Y H:i',strtotime($link['data_envio']));
$urlLink = $urlSistema . $linksDir . $link['id'] .'_' . $link['id_integrante'] . '_' . $link['nome_arquivo'];

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-link"></span> Link enviado</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?=$urlRetorno?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <table class="table">
            <tr><th>Data e hora</th></tr>
            <tr><td><?=$dataEnvio?></td></tr>
            <tr><th>De</th></tr>
            <tr><td><?=$link['fnome']?></td></tr>
            <tr><th>Para</th></tr>
            <tr><td><?=$link['inome']?></td></tr>
            <tr><th>Link gerado</th></tr>
            <tr><td><a href="<?=$urlLink?>" target="_new"><?=$urlLink?></a></td></tr>
            <tr><th>Conteúdo do link</th></tr>
            <tr><td><?=$link['nome_arquivo']?></td></tr>
            <tr><th>Descrição</th></tr>
            <tr><td><?=$descricao?></td></tr>
        </table>

    </div>
</div>