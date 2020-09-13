
<?php

require_once '../dto/IntegranteDto.php';
require_once '../controller/IntegranteController.php';

use Controller\IntegranteController;
use dto\IntegranteDto;

$msg = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $dto = new IntegranteDto($_POST);
    
    $controller = new IntegranteController;
    $res = $controller->logar($dto);
    if(is_bool($res)){
        echo '<script>window.location.href="../view/";</script>';
    }

    if(is_string($res)){
        $msg = '<div class="alert alert-danger">'. $res .'</div>';
    }
    
}
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-education"></span> Área do formando</h2>

        <?=$msg?>        

        <form method="POST" accept-charset="utf-8">

            <input type="hidden" name="p" value="l">

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <button class="btn btn-default">Logar</button>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>