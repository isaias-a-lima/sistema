<?php

use Controller\ComissaoController;

$msg = '';
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
$statusProjeto = isset($_GET['st']) ? $_GET['st'] : 'Planejamento';

require_once '../controller/ComissaoController.php';

$controller = new ComissaoController();
/* if(strlen($statusProjeto) > 0){
    $res = $controller->listByStatus($statusProjeto);
}else{ */
    $res = $controller->listar($busca, $statusProjeto);
/* } */

if (is_string($res)) {
    $msg = $res;
}

?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Comissões</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <button id="btn_comin" class="btn btn-danger"><span class="glyphicon glyphicon-plus"></span> Nova</button>

    </div>
</div>
<p>
    <div class="row">

        <div class="col-sm-6 col-md-4 col-lg-4">

            <div class="input-group">
                <input id="busca" type="search" class="form-control" name="busca" placeholder="Busca por Id, Faculdade ou Curso">
                <span id="btn_busca" class="input-group-addon link"><i class="glyphicon glyphicon-search"></i></span>
            </div>

        </div>

        <div class="col-sm-6 col-md-4 col-lg-4">

            <div class="input-group">
                <select id="opcao_busca" name="opcao_busca" class="form-control">
                    <option value="<?=$statusProjeto?>"><?=$statusProjeto?></option>
                    <option value="Planejamento">Planejamento</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Pendência">Pendência</option>
                    <option value="Criação">Criação</option>
                    <option value="Impressão">Impressão</option>
                    <option value="Acabamento">Acabamento</option>
                    <option value="Expedição">Expedição</option>
                    <option value="Entregue">Entregue</option>
                    <option value="Cancelado">Cancelado</option>
                </select>
                <span id="btn_opcao" class="input-group-addon link"><i class="glyphicon glyphicon-list"></i></span>
            </div>

        </div>
    </div>
</p>

<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8" style="min-height: 400px;">

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