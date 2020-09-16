<?php

use controller\EmpresaController;

$msg = '';

require_once '../controller/EmpresaController.php';
$empresa = EmpresaController::exibirEmpresa();
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-flag"></span> Empresa</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <button id="btn_emed" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span>
                Editar
            </button>
        </p>

        <table class="table">
            <tr>
                <th>Empresa</th>
            </tr>
            <tr>
                <td><?= $empresa->getNome() ?></td>
            </tr>

            <tr>
                <th>Telefone</th>
            </tr>
            <tr>
                <td><?= $empresa->getTelefone() ?></td>
            </tr>

            <tr>
                <th>E-mail Contato</th>
            </tr>
            <tr>
                <td><?= $empresa->getEmailContato() ?></td>
            </tr>

            <tr>
                <th>E-mail Financeiro</th>
            </tr>
            <tr>
                <td><?= $empresa->getEmailFinanceiro() ?></td>
            </tr>

            <tr>
                <th>Endereço</th>
            </tr>
            <tr>
                <td><?= $empresa->getEndereco() ?></td>
            </tr>

            <tr>
                <th>CNPJ</th>
            </tr>
            <tr>
                <td><?= $empresa->getCnpj() ?></td>
            </tr>

            <tr>
                <th>URL Sistema</th>
            </tr>
            <tr>
                <td><?= $empresa->getUrlSistema() ?></td>
            </tr>

            <tr>
                <th>Diretório de Links</th>
            </tr>
            <tr>
                <td><?= $empresa->getLinksDir() ?></td>
            </tr>

            <tr>
                <th>Diretório de Arquivos</th>
            </tr>
            <tr>
                <td><?= $empresa->getFilesDir() ?></td>
            </tr>

        </table>

    </div>
</div>
<script src="../view/empresa.js"></script>