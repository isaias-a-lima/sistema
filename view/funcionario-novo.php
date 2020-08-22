<?php
require_once '../dto/FuncionarioDto.php';
require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;
use dto\FuncionarioDto;

$res = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $dto = new FuncionarioDto($_POST);

    $controller = new FuncionarioController();

    $res = $controller->incluir($dto);    
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teste Novo Funcionário</title>
</head>

<body>

    <h1>Novo Funcionário</h1>

    <div style="color: red; padding: 10px 1%; width:98%;"><?= var_dump($res) ?></div>

    <form method="post">

        <input type="hidden" name="id" value="">

        <label for="nome">Nome</label><br>
        <input type="text" name="nome" id="nome"><br>

        <label for="telefone">Telefone</label><br>
        <input type="text" name="telefone" id="telefone"><br>

        <label for="email">E-mail</label><br>
        <input type="email" name="email" id="email"><br>

        <label for="funcao">Função</label><br>
        <input type="funcao" name="funcao" id="funcao"><br>

        <label for="senha">Senha</label><br>
        <input type="password" name="senha" id="senha"><br>

        <label for="statusFuncionario">Status</label><br>
        <input type="text" name="statusFuncionario" id="statusFuncionario"><br>

        <p>
            <button>Salvar</button>
        </p>

    </form>


</body>

</html>