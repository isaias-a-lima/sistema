<?php

$logado = '';

session_start();

if(isset($_SESSION['nomeSession'])){
    $logado = '<h4>Bem vindo(a) ' . $_SESSION['nomeSession'];
    $logado .= ' <a href="../view/?p=lo"><span class="glyphicon glyphicon-log-out"></span></a></h4>';
}else if(isset($_GET['p'])){
    if($_GET['p'] != 'lf' && $_GET['p'] != 'l'){
        header('Location:./?p=l');
    }
}else{
    header('Location:./?p=l');
}
?>