<?php

use Controller\FuncionarioController;
use dto\FuncionarioDto;

$msg = '';

require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dto = new FuncionarioDto($_POST);
    $controller = new FuncionarioController();
    $msg = $controller->mudarSenha($dto, $_POST['senhaNovaB']);
}
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
        <h2><span class="glyphicon glyphicon-cog"></span> Dados do usuário / Mudar Senha</h2>
        
        <div id="msg"></div>
        <?= $msg ?>

        <form id="form_fms" method="POST" accept-charset="utf-8">
            <input type="hidden" name="id" id="id" value="<?= $_SESSION['idSession'] ?>">
            <div class="form-group">
                <label>Senha Atual</label>
                <input type="password" name="senha" id="senhaAtual" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Senha Nova</label>
                <input type="password" name="senhaNovaA" id="senhaNovaA" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Confirme a Senha Nova</label>
                <input type="password" name="senhaNovaB" id="senhaNovaB" class="form-control" required>
            </div>
            <button type="button" id="btn_fms" class="btn btn-danger">Salvar</button>
        </form>
    </div>
</div>

<script src="../view/funcionario_mudar_senha.js"></script>