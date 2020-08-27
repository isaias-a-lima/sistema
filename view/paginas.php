<?php

if (!empty($_GET['p'])) {
    $p = $_GET['p'];
} else if (!empty($_POST['p'])) {
    $p = $_POST['p'];
} else {
    $p = '';
}

switch ($p) {
    case 'l':
        (isset($_SESSION['nomeSession']) && $_SESSION['funcaoSession'] == 'Funcionario') ?
            include '../view/ja_existe_sessao.php' :
            include '../view/formando_logar.php';
        break;
    case 'lo':
        include '../view/logout.php';
        break;
    case 'lf';
        if (isset($_SESSION['nomeSession']) && $_SESSION['funcaoSession'] == 'Formando') {
            include '../view/ja_existe_sessao.php';
        } else if (isset($_SESSION['nomeSession'])) {
            include '../view/funcionario_usuario.php';
        } else {
            include '../view/funcionario_logar.php';
        }
        break;
    case 'm':
        if (isset($_SESSION['nomeSession']) && $_SESSION['funcaoSession'] == 'Formando') {
            include '../view/formando_menu.php';
        } else if (isset($_SESSION['nomeSession'])) {
            include '../view/funcionario_menu.php';
        }
        break;
    case 'fms':
        include '../view/funcionario_mudar_senha.php';
        break;
    case 'fad':
        include '../view/funcionario_alterar_dados.php';
        break;
    case 'fin':
        include '../view/funcionario_incluir.php';
        break;
    case 'flis':
        include '../view/funcionario_listar.php';
        break;
    case 'fed':
        include '../view/funcionario_editar.php';
        break;
}
