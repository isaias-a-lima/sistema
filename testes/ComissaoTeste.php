<?php

require_once '../dto/ComissaoDto.php';
use dto\ComissaoDto;
require_once '../model/Comissao.php';
use model\Comissao;

echo 'Testando Comissão';



$dto = array();
$dto['id'] = 1;
$dto['faculdade'] = 'UNIP';
$dto['curso'] = 'ADM';
$dto['dataFormatura'] = '2020-12-01';
$dto['dataLimiteAprovacao'] = '2020-12-01';
$dto['dataPrevistaEntrega'] = '2020-12-01';
$dto['enderecoEntrega'] = 'Rua Gerônimo, 101, Vila Pulga - São Paulo - SP';
$dto['tempoAproxFrete'] = 60;
$dto['qtdInicialConvites'] = 500;
$dto['valorProjeto'] = 1500.00;
$dto['statusProjeto'] = 'Em andamento';

$comissaoDto = new ComissaoDto($dto);

$comissao = new Comissao($comissaoDto);

echo '<pre>';
print_r($comissaoDto);
echo '</pre>';
?>