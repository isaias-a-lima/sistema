<?php
require_once 'PessoaDto.php';

use dto\PessoaDto;


$_POST['nome']='Jonas';
$_POST['telefone']='11 98889-7777';
$_POST['email']='teste@teste.com';
$_POST['funcao']='Designer';
$_POST['senha']='1234';

$pessoa = new PessoaDto($_POST);
echo '<pre>';
print_r($pessoa);
echo '</pre>';
?>