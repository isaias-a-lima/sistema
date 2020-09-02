<?php

require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;

$msg = '';
$busca = '%';

if (isset($_GET['busca'])) {
    $busca = $_GET['busca'];
}

$controller = new FuncionarioController();
$res = $controller->listar($busca);
if (is_string($res)) {
    $msg = $res;
}

?>


<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-cog"></span> Usuários</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <button id="btn_fin" class="btn btn-danger">
            <span class="glyphicon glyphicon-plus"></span>
            Novo
        </button>

        <p>
            <div class="input-group">
                <input id="busca" type="search" class="form-control" name="busca" placeholder="Busca">
                <span id="btn_busca" class="input-group-addon link"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </p>

        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Função</th>
                <th>&nbsp;</th>
            </tr>
            <?php
            if (is_array($res) || is_object($res)) {
                while ($row = $res->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['nome'] . '</td>';
                    echo '<td>' . $row['funcao'] . '</td>';
                    echo '<td><span class="glyphicon glyphicon-edit link" onclick="editar(' . $row['id'] . ')"></span>';
                    echo '<span class="glyphicon glyphicon-remove link" onclick="remover(' . $row['id'] . ')"></span></td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</div>
<form id="form_fed" method="post" action="../view/?p=fed">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="acao" id="acao">
    <input type="hidden" name="sessao" id="sessao" value="<?= $_SESSION['idSession'] ?>">
</form>
<script src="../view/funcionario_listar.js"></script>