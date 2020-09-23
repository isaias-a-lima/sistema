<?php

require_once '../controller/ComissaoController.php';
require_once '../controller/IntegranteController.php';
require_once '../controller/PagamentoController.php';

use controller\ComissaoController;
use controller\IntegranteController;
use controller\PagamentoController;



$msg = '';

$id = $faculdade = $curso = $dataFormatura = $dataInicioArte = $dataLimiteAprovacao = '';
$dataPrevistaEntrega = $enderecoEntrega = $tempoAproxFrete = $qtdInicialConvites = '';
$valorProjeto = $statusProjeto = '';

if (isset($_GET['ic']) && !empty($_GET['ic'])) {

    $idComissao = $_GET['ic'];

    $comissao = new ComissaoController();

    $res = $comissao->selecionar($idComissao);
    if (is_string($res)) {
        $msg = $res;
    }
    if (is_array($res) || is_object($res)) {
        $id = $res['id'];
        $faculdade = $res['faculdade'];
        $curso = $res['curso'];
        $dataFormatura = $res['data_formatura'];
        if (!empty($dataFormatura)) {
            $dataFormatura = date('d/m/Y', strtotime($dataFormatura));
        }
        $dataInicioArte = $res['data_inicio_arte'];
        if (!empty($dataInicioArte)) {
            $dataInicioArte = date('d/m/Y', strtotime($dataInicioArte));
        }
        $dataLimiteAprovacao = $res['data_limite_aprovacao'];
        if (!empty($dataLimiteAprovacao)) {
            $dataLimiteAprovacao = date('d/m/Y', strtotime($dataLimiteAprovacao));
        }
        $dataPrevistaEntrega = $res['data_prevista_entrega'];
        if (!empty($dataPrevistaEntrega)) {
            $dataPrevistaEntrega = date('d/m/Y', strtotime($dataPrevistaEntrega));
        }
        $enderecoEntrega = $res['endereco_entrega'];
        $tempoAproxFrete = $res['tempo_aprox_frete'];
        $tempoAproxFrete .= ' minutos';
        $qtdInicialConvites = $res['qtd_inicial_convites'];
        $valorProjeto = 'R$ ' . number_format($res['valor_projeto'], 2, ",", ".");
        $statusProjeto = $res['status_projeto'];
    }
} else {
    $msg = '<div class="alert alert-danger">Nenhuma comissão foi selecionada!</div>';
    echo '<script>setTimeout(function(){window.location.href="../view/?p=comlis"},2000)</script>';
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
            <span class="glyphicon glyphicon-info-sign"></span> Dados da Comissão
        </h4>

        <p>
            <button class="btn btn-danger" onclick="editar(<?= $id ?>)">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
            <button class="btn btn-danger" onclick="cancelar(<?= $id ?>)">
                <span class="glyphicon glyphicon-remove"></span> Cancelar
            </button>
        </p>

        <table class="table">
            <tr>
                <th style="width:50%">Id Comissão</th>
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
            <tr>
                <th>Data formatura</th>
                <td><?= $dataFormatura ?></td>
            </tr>
            <tr>
                <th>Data início da arte</th>
                <td><?= $dataInicioArte ?></td>
            </tr>
            <tr>
                <th>Data limite aprovação</th>
                <td><?= $dataLimiteAprovacao ?></td>
            </tr>
            <tr>
                <th>Data prevista entrega</th>
                <td><?= $dataPrevistaEntrega ?></td>
            </tr>
            <tr>
                <th colspan="2">Endereço de entrega</th>
            </tr>
            <tr>
                <td colspan="2"><?= $enderecoEntrega ?></td>
            </tr>
            <tr>
                <th>Tempo aproximado do frete</th>
                <td><?= $tempoAproxFrete ?></td>
            </tr>
            <tr>
                <th>Qtd. inicial de convites</th>
                <td><?= $qtdInicialConvites ?></td>
            </tr>
            <tr>
                <th>Valor do projeto</th>
                <td><?= $valorProjeto ?></td>
            </tr>
            <tr>
                <th>Status do projeto</th>
                <td><?= $statusProjeto ?></td>
            </tr>
        </table>

    </div>

    <!-- FORMANDOS ---------------------------------------------------------------------- -->

    <?php
    require_once '../controller/IntegranteController.php';

    $msg2 = '';

    empty($id) ? $id = 0 : false;

    $integrante = new IntegranteController();
    $res2 = $integrante->listar($id);
    if (is_string($res2)) {
        $msg2 = $res2;
    }


    ?>
    <div class="col-sm-6 col-md-6 col-lg-6" style="min-height: 350px;">

        <?= $msg2 ?>

        <h4>
            <span class="glyphicon glyphicon-education"></span> Formandos
        </h4>

        <p>
            <button id="btn_iin" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus"></span> Novo
            </button>
            <input type="hidden" id="idComissao" value="<?= $id ?>">

            <button id="btn_elc" class="btn btn-danger">
                <span class="glyphicon glyphicon-upload"></span> Enviar Link à Comissão
            </button>
        </p>

        <table class="table">
            <tr>
                <th style="width: 10%;">Id</th>
                <th>Nome</th>
                <th style="text-align: center;"><span class="glyphicon glyphicon-option-vertical"></span></th>
            </tr>
            <?php
            if (is_array($res2) || is_object($res2)) {
                while ($row2 = $res2->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row2['id'] . '</td>';
                    echo '<td>' . $row2['nome'] . '</td>';
                    echo '<td style="text-align: center;">';
                    echo '<span class="glyphicon glyphicon-eye-open link" onclick="exibirIntegrante(' . $row2['id'] . ',' . $idComissao . ')"></span>';
                    echo '<span class="glyphicon glyphicon-edit link" onclick="editarIntegrante(' . $row2['id'] . ',' . $idComissao . ')"></span>';
                    echo '<span class="glyphicon glyphicon-remove link"></span>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>

    </div>

    <!-- PAGAMENTO -->
    <div class="col-sm-12 col-md-6">

        <h4><span class="glyphicon glyphicon-usd"></span> Pagamentos</h4>        

        <table class="table">
            <tr>
                <th>Status</th>
                <th>Forma de Pgto.</th>
                <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                <th>Valor</th>
            </tr>

            <?php
            $pgt = new PagamentoController();
            $res3 = $pgt->selecionarPorComissao($idComissao);
            if (is_string($res3)) {
                echo $res3;
            } else {
                $valorTotal = 0;

                while ($row3 = $res3->fetch_assoc()) {
                    $valorTotal += $row3['valor'];
                    $valor = number_format($row3['valor'], 2, ",", ".");
                    $statusPagamento = $row3['status_pagamento'];
                    $classLinha = '';
                    switch ($statusPagamento) {
                        case 'Pendente':
                            $classLinha = 'warning';
                            break;
                        case 'Pago':
                            $classLinha = 'success';
                            break;
                        case 'Vencido':
                            $classLinha = 'danger';
                            break;
                    }
                    echo "<tr class='$classLinha'>";
                    echo '<td>' . $statusPagamento . '</td>';
                    echo '<td>' . $row3['forma_pagamento'] . '</td>';
                    echo '<td><a href="#" onclick="exibirIntegrante(' . $row3['id_integrante'] . ',' . $idComissao . ')"><span class="glyphicon glyphicon-user"></span></a></td>';
                    echo '<td>R$ ' . $valor . '</td>';                    
                    echo '</tr>';
                }
                $valorTotal = number_format($valorTotal, 2, ",", ".");
                echo "<tr><td></td><td></td><th align='right'>Total</th><th>R$ $valorTotal</th></tr>";
            }
            ?>

        </table>

    </div>
</div>

<input type="hidden" id="idComissao" value="<?= $idComissao ?>">

<form id="form_comvis" method="post" action="../view/?p=comed">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="acao" id="acao">
    <input type="hidden" name="t" id="t" value="comvis">
</form>
<script src="../view/comissao_visao.js"></script>