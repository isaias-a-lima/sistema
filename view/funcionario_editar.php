<?php

use Controller\FuncionarioController;
use dto\FuncionarioDto;

require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

$msg = '';

if (isset($_POST['nome'])) {

    $dto = new FuncionarioDto($_POST);
    $controller = new FuncionarioController();
    $res = $controller->editar($dto);

    if (is_string($res)) {
        $msg = $res;
    }
}


$id = $nome = $telefone = $email = $funcao = $statusFuncionario = null;

if (isset($_POST['id']) && isset($_POST['acao'])) {

    $dto = new FuncionarioDto($_POST);
    $controller = new FuncionarioController();

    if ($_POST['acao'] == 'remover') {

        $res = $controller->remover($_POST['id']);
        if (is_string($res)) {
            $msg = $res;
        }
    }

    $res = $controller->selecionar($dto);

    if (is_string($res)) {
        $msg = $res;
    }

    if (is_array($res) || is_object($res)) {
        $id = $res['id'];
        $nome = $res['nome'];
        $telefone = $res['telefone'];
        $email = $res['email'];
        $funcao = $res['funcao'];
        $senha = $res['senha'];
        $statusFuncionario = $res['statusFuncionario'];
    }
} else {
    $msg = 'Nenhum Usuário ou Acão selecionada!';
}



?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
        <h2><span class="glyphicon glyphicon-cog"></span> Usuários / Editar</h2>
        <?= $msg ?>

        <form method="post" accept-charset="utf-8">

            <input type="hidden" name="id" value="<?= $id ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?= $nome ?>">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $telefone ?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control" required value="<?= $email ?>">
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control" required>
                    <option value="<?= $funcao ?>"><?= $funcao ?></option>
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
                <input type="password" name="senha" id="senha" value="<?= $senha ?>" readonly class="form-control" required>
            </div>

            <div class="form-group">
                <label for="statusFuncionario">Status</label>
                <select name="statusFuncionario" id="statusFuncionario" class="form-control" required>
                    <option value="<?= $statusFuncionario ?>"><?= $statusFuncionario ?></option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <p>
                <button class="btn btn-danger">Salvar</button>
            </p>

        </form>

    </div>
</div>