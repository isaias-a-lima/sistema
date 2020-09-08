<?php

$msg = '';

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

require_once '../controller/IntegranteController.php';

use controller\IntegranteController;

$integrante = new IntegranteController();
    $res = $integrante->listar($busca);
    if(is_string($res)){
        $msg = $res;
    }
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-education"></span> Formandos</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <div class="input-group">
                <input id="busca" type="search" class="form-control" name="busca" placeholder="Busca">
                <span id="btn_busca" class="input-group-addon link"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </p>

        <table class="table">
            <tr>
                <th style="width: 10%;">Id</th>
                <th>Nome</th>
                <th>Função</th>                 
                <th>&nbsp;</th>
            </tr>
            <?php
            if(is_array($res) || is_object($res)){
                while($row = $res->fetch_assoc()){
                    echo '<tr>';
                    echo '<td>'. $row['id'] .'</td>';
                    echo '<td>'. $row['nome'] .'</td>';
                    echo '<td>'. $row['funcao'] .'</td>';
                    echo '<td>';
                    echo '<span class="glyphicon glyphicon-eye-open link" onclick="exibirIntegrante('.$row['id'].')"></span>';                    
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>

    </div>
</div>
<script src="../view/integrante_listar.js"></script>