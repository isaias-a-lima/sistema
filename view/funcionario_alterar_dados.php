<?php

require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;
use dto\FuncionarioDto;

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $dto = new FuncionarioDto($_POST);
    $controller = new FuncionarioController();    
    $msg = $controller->alterarDados($dto);
    
}

$dados = array();
$dados['id'] = $_SESSION['idSession'];

$dto = new FuncionarioDto($dados);
$controller = new FuncionarioController();



$res = $controller->selecionar($dto);
if(is_array($res)){
    $id = $res['id'];
    $nome = $res['nome'];
    $telefone = $res['telefone'];
    $email = $res['email'];
    $funcao = $res['funcao'];
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-cog"></span> Usuário / Atualizar</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=lf">Voltar</a></li>
        </ul>
        
        <div id="msg"></div>
        <?= $msg ?>

        <form id="form_fad" method="POST" accept-charset="utf-8">
            <input type="hidden" name="id" id="id" value="<?=$id?>">

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?=$nome?>">
            </div>

            <div class="form-group">
                <label>Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" required value="<?=$telefone?>">
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required value="<?=$email?>">
            </div>

            <div class="form-group">
                <label>Função</label>
                <select name="funcao" id="funcao" class="form-control">
                    <option value="<?=$funcao?>"><?=$funcao?></option>                    
                    <!-- <option value="Operador">Operador</option>
                    <option value="Designer">Designer</option>
                    <option value="Secretário(a)">Secretário</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Diretor Arte">Diretor Arte</option>
                    <option value="Diretor ADM">Diretor ADM</option> -->
                </select>                
            </div>
            <p>
            <button class="btn btn-danger">Salvar</button>
            </p>
        </form>

    </div>

</div>