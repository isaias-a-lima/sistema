<?php

require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;

$msg = '';

$controller = new FuncionarioController();
$res = $controller->listar();
if (is_string($res)) {
    $msg = $res;
}

?>


<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
        <h2><span class="glyphicon glyphicon-cog"></span> Usuários</h2>
        <?= $msg ?>


        <div class="input-group">
            <input id="busca" type="search" class="form-control" name="busca" placeholder="Busca">
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>


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
                    echo '<td><span class="glyphicon glyphicon-edit link"></span>';
                    echo '<span class="glyphicon glyphicon-remove link"></span></td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</div>