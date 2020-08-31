<?php

use Controller\ComissaoController;

$msg = '';
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

require_once '../controller/ComissaoController.php';

$controller = new ComissaoController();
$res = $controller->listar($busca);
if (is_string($res)) {
    $msg = $res;
}

?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Comissões</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>


        <div class="input-group col-sm-6">
            <input id="busca" type="search" class="form-control" name="busca" placeholder="Busca por Id, Faculdade ou Curso">
            <span id="btn_busca" class="input-group-addon link"><i class="glyphicon glyphicon-search"></i></span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <tr>
                    <th>Id</th>
                    <th>Faculdade</th>
                    <th>Curso</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                </tr>
                <?php
                if (is_array($res) || is_object($res)) {
                    while ($row = $res->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['faculdade'] . '</td>';
                        echo '<td>' . $row['curso'] . '</td>';
                        echo '<td>' . $row['status_projeto'] . '</td>';
                        echo '<td><span class="glyphicon glyphicon-eye-open link" onclick="visao(' . $row['id'] . ')"></span>';
                        echo '<span class="glyphicon glyphicon-edit link" onclick="editar(' . $row['id'] . ')"></span>';
                        echo '<span class="glyphicon glyphicon-remove link" onclick="cancelar(' . $row['id'] . ')"></span></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>
<form id="form_comed" method="post" action="../view/?p=comed">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="acao" id="acao">
</form>
<script src="../view/comissao_listar.js"></script>