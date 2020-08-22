<?php

require_once '../controller/FuncionarioController.php';

use Controller\FuncionarioController;

$controller = new FuncionarioController();
$res = $controller->logout();
if($res){
    echo '<script>window.location.href="../view/";</script>';
}
