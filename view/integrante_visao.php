<?php
$idComissao = isset($_GET['ic']) ? $_GET['ic'] : 0;
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : 0;
$target = isset($_GET['t']) ? $_GET['t'] : 'comvis&ic=' . $idComissao;
$urlRetorno = '?p=' . $target;
$urlRetorno = (strpos($urlRetorno,'comvis') >= 0 && $idComissao == 0) ? '?p=ilis' : $urlRetorno;

$msg = '';

require_once '../controller/IntegranteController.php';
require_once '../controller/LinkController.php';
require_once '../controller/EmpresaController.php';
require_once '../controller/PagamentoController.php';

use controller\EmpresaController;
use controller\IntegranteController;
use controller\LinkController;
use controller\PagamentoController;

$integrante = new IntegranteController();
$res = $integrante->selecionar($idIntegrante);
if (is_string($res)) {
    $msg = $res;
}

$idComissao = $res['id_comissao'];
?>

<input type="hidden" id="idIntegrante" value="<?= $idIntegrante ?>">
<input type="hidden" id="idComissao" value="<?= $idComissao ?>">

<div class="row">
    <div class="col-sm-12">

        <h2><span class="glyphicon glyphicon-education"></span> Formando</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-6">

        <h4><span class="glyphicon glyphicon-info-sign"></span> Dados do Formando</h4>

        <p>
            <button id="btn_ied" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span>
                Editar
            </button>


        </p>

        <table class="table">
            <tr>
                <th>Nome</th>
            </tr>
            <tr>
                <td><?= $res['nome'] ?></td>
            </tr>

            <tr>
                <th>Telefone</th>
            </tr>
            <tr>
                <td><?= $res['telefone'] ?></td>
            </tr>

            <tr>
                <th>E-mail</th>
            </tr>
            <tr>
                <td><?= $res['email'] ?></td>
            </tr>
            <tr>
                <th>Função</th>
            </tr>
            <tr>
                <td><?= $res['funcao'] ?></td>
            </tr>

            <tr>
                <th>Informações convite</th>
            </tr>
            <tr>
                <td><?= $res['informacoes_convite'] ?></td>
            </tr>

            <tr>
                <th>Mensagem personalizada</th>
            </tr>
            <tr>
                <td><?= $res['mensagem_personalizada'] ?></td>
            </tr>
        </table>

    </div>

    <div class="col-sm-12 col-md-6">

        <!-- LINKS -->

        <h4><span class="glyphicon glyphicon-link"></span> Links enviados</h4>

        <p>
            <button id="btn_el" class="btn btn-danger">
                <span class="glyphicon glyphicon-upload"></span> Enviar
            </button>
        </p>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Arquivo</th>
                    <th>Data</th>
                    <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                    <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                </tr>

                <?php
                $empresa = EmpresaController::exibirEmpresa();
                $urlSistema = $empresa->getUrlSistema();
                $linksDir = $empresa->getLinksDir();
                $urlLink = '';

                $link = new LinkController();
                $links = $link->listarPorIntegrante($idIntegrante, $idComissao);
                if (is_string($links)) {
                    echo 'ERRO: ' . $links;
                } else {
                    while ($row = $links->fetch_assoc()) {
                        $urlLink = $urlSistema . $linksDir . $row['id'] . '_' . $row['id_integrante'] . '_' . $row['nome_arquivo'];
                        $dataEnvio = date('d/m/Y H:i', strtotime($row['data_envio']));
                        echo '<tr>';
                        echo '<td>' . $row['nome_arquivo'] . '</td>';
                        echo '<td>' . $dataEnvio . '</td>';
                        echo '<td><a href="../view/?p=lvis&idl=' . $row['id'] . '"><span class="glyphicon glyphicon-eye-open"></span></a></td>';
                        echo '<td><a href="' . $urlLink . '" target="_new"><span class="glyphicon glyphicon-download"></span></a></td>';
                        echo '</tr>';
                    }
                }
                ?>

            </table>
        </div>

    </div>

    <div class="col-sm-12 col-md-6">

        <!-- ARQUIVOS -->

        <h4><span class="glyphicon glyphicon-file"></span> Arquivos recebidos</h4>

        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>Arquivo</th>
                    <th>Data</th>
                    <th><span class="glyphicon glyphicon-option-vertical"></span></th>
                </tr>
            </table>
        </div>

    </div>

    <div class="col-sm-12 col-md-6">

        <!-- PAGAMENTO -->

        <h4><span class="glyphicon glyphicon-usd"></span> Pagamentos</h4>

        <p>
            <button id="btn_pg" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus"></span>
                Incluir
            </button>
        </p>

        <table class="table">
            <tr>
                <th>Status</th>
                <th>Forma de Pgto.</th>
                <th>Valor</th>
                <th><span class="glyphicon glyphicon-option-vertical"></span></th>
            </tr>

            <?php
            $pgt = new PagamentoController();
            $res3 = $pgt->selecionarPorIntegrante($idIntegrante);
            if (is_string($res3)) {
                echo $res3;
            } else {

                while ($row3 = $res3->fetch_assoc()) {
                    $valor = number_format($row3['valor'], 2, ",", ".");
                    $statusPagamento = $row3['status_pagamento'];
                    $idPagamento = $row3['id'];
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
                    echo '<td>R$ ' . $valor . '</td>';
                    echo "<td><a href='#' onclick='editarPagamento($idPagamento)'><span class='glyphicon glyphicon-edit'></span></a></td>";
                    echo '</tr>';
                }
            }
            ?>

        </table>

    </div>
</div>
<script src="../view/integrante_visao.js"></script>