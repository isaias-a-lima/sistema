<?php

use Controller\ComissaoController;

require_once '../controller/ComissaoController.php';

$msg = '';

$id = $faculdade = $curso = $dataFormatura = $dataInicioArte = $dataLimiteAprovacao = '';
$dataPrevistaEntrega = $enderecoEntrega = $tempoAproxFrete = $qtdInicialConvites = '';
$valorProjeto = $statusProjeto = '';

if (isset($_GET['id'])) {

    $comissao = new ComissaoController();

    $res = $comissao->selecionar($_GET['id']);
    if (is_string($res)) {
        $msg = $res;
    }
    if (is_array($res) || is_object($res)) {
        $id = $res['id'];
        $faculdade = $res['faculdade'];
        $curso = $res['curso'];
        $dataFormatura = $res['data_formatura'];
        $dataFormatura = date('d/m/Y',strtotime($dataFormatura));
        $dataInicioArte = $res['data_inicio_arte'];
        $dataInicioArte = date('d/m/Y',strtotime($dataInicioArte));
        $dataLimiteAprovacao = $res['data_limite_aprovacao'];
        $dataLimiteAprovacao = date('d/m/Y',strtotime($dataLimiteAprovacao));
        $dataPrevistaEntrega = $res['data_prevista_entrega'];
        $dataPrevistaEntrega = date('d/m/Y',strtotime($dataPrevistaEntrega));
        $enderecoEntrega = $res['endereco_entrega'];
        $tempoAproxFrete = $res['tempo_aprox_frete'];
        $tempoAproxFrete .= ' minutos';
        $qtdInicialConvites = $res['qtd_inicial_convites'];
        $valorProjeto = $res['valor_projeto'];
        $valorProjeto = 'R$ ' . $valorProjeto;
        $statusProjeto = $res['status_projeto'];
    }
}
?>

<div class="row">
    <div class="col-md-12">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Comissão </h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=comlis">Voltar</a></li>
        </ul>

        <?= $msg ?>
    </div>
</div>

<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-6" style="min-height: 350px;">

        <h4>
            Dados da Comissão &nbsp;
            <button class="btn btn-danger" onclick="editar(<?=$id?>)"><span class="glyphicon glyphicon-edit"></span> Editar</button>
        </h4>

        <table class="table">
            <tr>
                <th style="width: 25%;">ID</th>
                <td><?= $id ?></td>
            </tr>
            <tr>
                <th>Faculdade</th>
                <td><?= $faculdade ?></td>
            </tr>
            <tr>
                <th>Curso</th>
                <td><?= $curso ?></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <th>Data formatura</th>
                <th>Data início da arte</th>
            </tr>
            <tr>

                <td><?= $dataFormatura ?></td>
                <td><?= $dataInicioArte ?></td>
            </tr>
            <tr>
                <th>Data limite aprovação</th>
                <th>Data prevista entrega</th>
            </tr>
            <tr>

                <td><?= $dataLimiteAprovacao ?></td>
                <td><?= $dataPrevistaEntrega ?></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <th colspan="2">Endereço de entrega</th>
            </tr>
            <tr>
                <td colspan="2"><?= $enderecoEntrega ?></td>
            </tr>
        </table>
        <table class="table">
            <tr>
                <th style="width: 50%;">Tempo aproximado do frete</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td><?= $tempoAproxFrete ?></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <th>Qtd. inicial de convites</th>
                <th>Valor do projeto</th>
            </tr>
            <tr>
                <td><?= $qtdInicialConvites ?></td>
                <td><?= $valorProjeto ?></td>
            </tr>
            <tr>
                <th>Status do projeto</th>
                <td><?= $statusProjeto ?></td>
            </tr>
        </table>

    </div>
<!-- ---------------------------------------------------------------------- -->
    <div class="col-sm-6 col-md-6 col-lg-6" style="min-height: 350px;">

        <h4>
            Formandos &nbsp;
            <button class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Novo</button>
        </h4>

        <table class="table">
            <tr>
                <th>Nome</th>
                <th>Info</th>
                <th>Msg</th>
                <th>Fotos</th>
                <th>Pgto</th>
            </tr>
        </table>

    </div>
</div>

<form id="form_comvis" method="post" action="../view/?p=comed">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="acao" id="acao">
</form>
<script src="../view/comissao_visao.js"></script>