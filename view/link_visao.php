<?php

require_once '../controller/LinkController.php';
require_once '../controller/EmpresaController.php';

use controller\EmpresaController;
use controller\LinkController;

$msg = '';
$urlRetorno = '';
$idl = isset($_GET['idl']) ? $_GET['idl'] : 0;
$empresa = EmpresaController::exibirEmpresa();
$urlSistema = $empresa->getUrlSistema();
$linksDir = $empresa->getLinksDir();

$idLink = $idIntegrante = $idComissao = 0;
$descricao = $dataEnvio = $nomeArquivo = $nomeFuncionario = $nomeIntegrante = '';
$controller = new LinkController();
$link = $controller->selecionar($idl);
if(is_string($link)){
    $msg = $link;
}else if(is_object($link)){
    $row = $link->fetch_array();
    if(isset($row['id'])){
        $idLink = $row['id'];
        $idIntegrante = $row['id_integrante'];
        $idComissao = $row['id_comissao'];
        $nomeIntegrante = $row['inome'];
        if(empty($nomeIntegrante)){
            $nomeIntegrante = "Todos da Comissão ID: $idComissao";
        }
        $nomeFuncionario = $row['fnome'];        
        $nomeArquivo = $row['nome_arquivo'];
        $descricao = $row['descricao'];
        $dataEnvio = $row['data_envio'];
    }
    
}

$urlRetorno = '?p=ivis&id=' . $idIntegrante . '&ic=' . $idComissao;

$descricao = str_replace(array("\r\n","\n","\r"),"<br>",$descricao);
$dataEnvio = date('d/m/Y H:i',strtotime($dataEnvio));
$urlLink = $urlSistema . $linksDir . $idLink .'_' . $idIntegrante . '_' . $nomeArquivo;

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-link"></span> Link enviado</h2>

        <ul class="pager">
            <li class="previous"><a href="#" onclick="window.history.back()">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <table class="table">
            <tr><th>Data e hora</th></tr>
            <tr><td><?=$dataEnvio?></td></tr>
            <tr><th>De</th></tr>
            <tr><td><?=$nomeFuncionario?></td></tr>
            <tr><th>Para</th></tr>
            <tr><td><?=$nomeIntegrante?></td></tr>
            <tr><th>Link gerado</th></tr>
            <tr><td><a href="<?=$urlLink?>" target="_new"><?=$urlLink?></a></td></tr>
            <tr><th>Conteúdo do link</th></tr>
            <tr><td><?=$nomeArquivo?></td></tr>
            <tr><th>Descrição</th></tr>
            <tr><td><?=$descricao?></td></tr>
        </table>

    </div>
</div>