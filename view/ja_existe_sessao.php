<?php
$msg='';
if($_GET['p'] == 'l'){
    $msg = '<h2><span class="glyphicon glyphicon-education"></span> Área do formando</h2>';
}else{
    $msg = '<h2><span class="glyphicon glyphicon-cog"></span> Área administrativa</h2>';
}
?>
<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
    <?=$msg?>
        <p>
            <div class="alert alert-danger">
                Já existe uma sessão de usuário ativa!<br>
                Se você não é <b><?= $_SESSION['nomeSession'] ?></b> clique em
                <a href="../view/?p=lo"><span class="glyphicon glyphicon-log-out"></span></a>
                para sair!
            </div>
        </p>
    </div>
</div>