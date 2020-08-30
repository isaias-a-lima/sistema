<?php

require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;
use dto\FuncionarioDto;

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dto = new FuncionarioDto($_POST);
    $controller = new FuncionarioController();

    $msg = $controller->incluir($dto);
}

?>


<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-cog"></span> Novo Usuário</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=m">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <form method="post" accept-charset="utf-8">

            <input type="hidden" name="id" value="">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control" required>
                <option value="">...Escolha</option>
                    <option value="Operador(a)">Operador(a)</option>
                    <option value="Designer">Designer</option>
                    <option value="Secretário(a)">Secretário(a)</option>
                    <option value="Gerente">Gerente</option>
                    <option value="Diretor(a) Arte">Diretor(a) Arte</option>
                    <option value="Diretor(a) ADM">Diretor(a) ADM</option>
                </select>                
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="text" name="senha" id="senha" value="1234" readonly class="form-control" required>
            </div>

            <div class="form-group">
                <label for="statusFuncionario">Status</label>
                <select name="statusFuncionario" id="statusFuncionario" class="form-control" required>
                    <option value="Ativo">Ativo</option>
                </select>                
            </div>

            <p>
                <button class="btn btn-danger">Salvar</button>
            </p>

        </form>

    </div>
</div>