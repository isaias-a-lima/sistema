<?php

require_once '../controller/EmpresaController.php';

use controller\EmpresaController;

$msg = '';

if(isset($_POST['nome'])){

    $empresaC = new EmpresaController();
    $res = $empresaC->editarEmpresa($_POST);

    $msg = $res;
    
}


$empresa = EmpresaController::exibirEmpresa();
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-flag"></span> Editar Empresa</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=em">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <form method="POST" accept-charset="utf-8">
                <div class="form-group">
                    <label>Empresa</label>
                    <input type="text" name="nome" required class="form-control" value="<?= $empresa->getNome() ?>">
                </div>

                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" required class="form-control" value="<?= $empresa->getTelefone() ?>">
                </div>

                <div class="form-group">
                    <label>E-mail contato</label>
                    <input type="text" name="emailContato" required class="form-control" value="<?= $empresa->getEmailContato() ?>">
                </div>

                <div class="form-group">
                    <label>E-mail financeiro</label>
                    <input type="text" name="emailFinanceiro" required class="form-control" value="<?= $empresa->getEmailFinanceiro() ?>">
                </div>

                <div class="form-group">
                    <label>Endereço</label>
                    <input type="text" name="endereco" required class="form-control" value="<?= $empresa->getEndereco() ?>">
                </div>

                <div class="form-group">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" required class="form-control" value="<?= $empresa->getCnpj() ?>">
                </div>

                <div class="form-group">
                    <label>URL Sistema</label>
                    <input type="text" name="urlSistema" required class="form-control" value="<?= $empresa->getUrlSistema() ?>">
                </div>

                <div class="form-group">
                    <label>Diretório de Links</label>
                    <input type="text" name="linksDir" readonly required class="form-control" value="<?= $empresa->getLinksDir() ?>">
                </div>

                <div class="form-group">
                    <label>Diretório de Arquivos</label>
                    <input type="text" name="filesDir" required class="form-control" value="<?= $empresa->getFilesDir() ?>">
                </div>

                <button class="btn btn-danger">Salvar</button>
            </form>
        </p>

    </div>
</div>