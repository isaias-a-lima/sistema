<?php

use Controller\FuncionarioController;
use dto\FuncionarioDto;

require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

$msg = '';

$dados = array();
$dados['id'] = $_SESSION['idSession'];

$dto = new FuncionarioDto($dados);
$controller = new FuncionarioController();
$res = $controller->selecionar($dto);
if (is_string($res)) {
    $msg = $res;
} else {
    $nome = $res['nome'];
    $telefone = $res['telefone'];
    $email = $res['email'];
    $funcao = $res['funcao'];
    
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
        <h2><span class="glyphicon glyphicon-cog"></span> Usuário</h2>
        <?= $msg ?>

        <table class="table">
            <tr>
                <th>Nome</th><td><?=$nome?></td>
            </tr>
            <tr>
                <th>Telefone</th><td><?=$telefone?></td>
            </tr>
            <tr>
                <th>E-mail</th><td><?=$email?></td>
            </tr>
            <tr>
                <th>Função</th><td><?=$funcao?></td>
            </tr>
        </table>

        <button type="button" id="btn_fad" class="btn btn-default">Atualizar dados</button>
        <button type="button" id="btn_fms" class="btn btn-default">Mudar senha</button>       

    </div>
</div>
<script src="../view/funcionario_usuario.js"></script>