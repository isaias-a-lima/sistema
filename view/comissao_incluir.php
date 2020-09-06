<?php

use Controller\ComissaoController;
use dto\ComissaoDto;

$msg = '';
$urlRetorno = isset($_GET['t']) ? $_GET['t'] : 'm';

require_once '../dto/ComissaoDto.php';
require_once '../controller/ComissaoController.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dto = new ComissaoDto($_POST);
    $controller = new ComissaoController();
    
    $msg = $controller->incluir($dto);
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Nova Comissão</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=<?=$urlRetorno?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <form id="form_comin" method="post" accept-charset="utf-8">

            <input type="hidden" name="id" value="">

            <div class="form-group">
                <label>Faculdade</label>
                <input type="text" name="faculdade" id="faculdade" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Curso</label>
                <input type="text" name="curso" id="curso" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Data formatura</label>
                <input type="date" name="dataFormatura" id="dataFormatura" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Data início da arte</label>
                <input type="date" name="dataInicioArte" id="dataInicioArte" class="form-control">
            </div>

            <div class="form-group">
                <label>Data limite para aprovação</label>
                <input type="date" name="dataLimiteAprovacao" id="dataLimiteAprovacao" class="form-control">
            </div>

            <div class="form-group">
                <label>Data prevista entrega</label>
                <input type="date" name="dataPrevistaEntrega" id="dataPrevistaEntrega" class="form-control">
            </div>

            <div class="form-group">
                <label>Endereço de entrega</label>
                <input type="text" name="enderecoEntrega" id="enderecoEntrega" placeholder="Rua, Número, Bairro, Cidade, CEP" class="form-control">
            </div>

            <div class="form-group">
                <label>Tempo aproximado do frete (minutos)</label>
                <input type="number" name="tempoAproxFrete" id="tempoAproxFrete" class="form-control">
            </div>

            <div class="form-group">
                <label>Quantidade inicial de convites contratada</label>
                <input type="number" name="qtdInicialConvites" id="qtdInicialConvites" class="form-control">
            </div>

            <div class="form-group">
                <label>Valor do projeto (R$)</label>
                <input type="number" name="valorProjeto" id="valorProjeto" class="form-control">
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="statusProjeto" id="statusProjeto" class="form-control">
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

<script src="comissao_incluir.js"></script>