<?php

use Controller\ComissaoController;
use dto\ComissaoDto;

$msg = '';

$urlRetorno = isset($_POST['t']) ? $_POST['t'] : 'comlis';
$idComissao = isset($_POST['id']) ? $_POST['id'] : 0 ;

require_once '../controller/ComissaoController.php';
require_once '../dto/ComissaoDto.php';

if (isset($_POST['faculdade'])) {
    $dto = new ComissaoDto($_POST);
    $controller = new ComissaoController();
    $res = $controller->editar($dto);

    if (is_string($res)) {
        $msg = $res;
    }
}

$id = $faculdade = $curso = $dataFormatura = $dataInicioArte = $dataLimiteAprovacao = '';
$dataPrevistaEntrega = $enderecoEntrega = $tempoAproxFrete = $qtdInicialConvites = '';
$valorProjeto = $statusProjeto = '';

if (isset($_POST['id']) && isset($_POST['acao'])) {

    $dto = new ComissaoDto($_POST);
    $controller = new ComissaoController();

    if($_POST['acao'] == 'Cancelar'){
       $msg = $controller->remover($_POST['id']);
    }


    $res = $controller->selecionar($_POST['id']);
    if (is_string($res)) {
        $msg = $res;
    }
    if (is_array($res) || is_object($res)) {
        $id = $res['id'];
        $faculdade = $res['faculdade'];
        $curso = $res['curso'];
        $dataFormatura = $res['data_formatura'];
        $dataInicioArte = $res['data_inicio_arte'];
        $dataLimiteAprovacao = $res['data_limite_aprovacao'];
        $dataPrevistaEntrega = $res['data_prevista_entrega'];
        $enderecoEntrega = $res['endereco_entrega'];
        $tempoAproxFrete = $res['tempo_aprox_frete'];
        $qtdInicialConvites = $res['qtd_inicial_convites'];
        $valorProjeto = $res['valor_projeto'];
        $statusProjeto = $res['status_projeto'];
    }
}

?>
<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Editar Comissão</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=<?=$urlRetorno?>&ic=<?=$idComissao?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <form id="form_comed" method="post" accept-charset="utf-8">

            <div class="form-group">
                <label>Id</label>
                <input type="text" name="id" class="form-control" readonly value="<?= $id ?>">
            </div>

            <div class="form-group">
                <label>Faculdade</label>
                <input type="text" name="faculdade" id="faculdade" class="form-control" required value="<?= $faculdade ?>">
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" name="curso" id="curso" class="form-control" required value="<?= $curso ?>">
            </div>

            <div class="form-group">
                <label>Data formatura</label>
                <input type="date" name="dataFormatura" id="dataFormatura" class="form-control" required value="<?= $dataFormatura ?>">
            </div>

            <div class="form-group">
                <label>Data início da arte</label>
                <input type="date" name="dataInicioArte" id="dataInicioArte" class="form-control" value="<?= $dataInicioArte ?>">
            </div>

            <div class="form-group">
                <label>Data limite para aprovação</label>
                <input type="date" name="dataLimiteAprovacao" id="dataLimiteAprovacao" class="form-control" value="<?= $dataLimiteAprovacao ?>">
            </div>

            <div class="form-group">
                <label>Data prevista entrega</label>
                <input type="date" name="dataPrevistaEntrega" id="dataPrevistaEntrega" class="form-control" value="<?= $dataPrevistaEntrega ?>">
            </div>

            <div class="form-group">
                <label>Endereço de entrega</label>
                <input type="text" name="enderecoEntrega" id="enderecoEntrega" placeholder="Rua, Número, Bairro, Cidade, CEP" class="form-control" value="<?= $enderecoEntrega ?>">
            </div>

            <div class="form-group">
                <label>Tempo aproximado do frete (minutos)</label>
                <input type="number" name="tempoAproxFrete" id="tempoAproxFrete" class="form-control" value="<?= $tempoAproxFrete ?>">
            </div>

            <div class="form-group">
                <label>Quantidade inicial de convites contratada</label>
                <input type="number" name="qtdInicialConvites" id="qtdInicialConvites" class="form-control" value="<?= $qtdInicialConvites ?>">
            </div>

            <div class="form-group">
                <label>Valor do projeto (R$)</label>
                <input type="number" name="valorProjeto" id="valorProjeto" class="form-control" step="0.01" value="<?= $valorProjeto ?>">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="statusProjeto" id="statusProjeto" class="form-control">
                    <option value="<?= $statusProjeto ?>"><?= $statusProjeto ?></option>
                    <option value="Planejamento">Planejamento</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Pendência">Pendência</option>
                    <option value="Criação">Criação</option>
                    <option value="Impressão">Impressão</option>
                    <option value="Acabamento">Acabamento</option>
                    <option value="Expedição">Expedição</option>
                    <option value="Entregue">Entregue</option>
                </select>
            </div>

            <p>
                <button class="btn btn-danger">Salvar</button>
            </p>

        </form>

    </div>
</div>

<script src="../view/comissao_editar.js"></script>