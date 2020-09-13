<?php

use Controller\IntegranteController;
use dto\IntegranteDto;

require_once '../controller/IntegranteController.php';

$msg = '';


$id = $_SESSION['idSession'];

$controller = new IntegranteController();
$res = $controller->selecionar($id);
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

        <h2><span class="glyphicon glyphicon-user"></span> Meus dados de usuário</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/">Voltar</a></li>
        </ul>
        
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

    </div>
</div>
<script src="../view/integrante_usuario.js"></script>