<?php

require_once '../controller/IntegranteController.php';
require_once '../dto/IntegranteDto.php';

use controller\IntegranteController;
use dto\IntegranteDto;

$msg = '';
$target = isset($_GET['t']) ? $_GET['t'] : '';
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : 0;
$idComissao = isset($_GET['ic']) ? $_GET['ic'] : 0;
$urlRetorno = '?p=' . $target . '&ic=' . $idComissao . '&id=' . $idIntegrante;

if (isset($_POST['nome'])) {    

    $dto = new IntegranteDto($_POST);
    $controller = new IntegranteController();
    $res = $controller->editar($dto);
    if (is_string($res)) {
        $msg = $res;
    }
    if (is_numeric($res)) {
        $msg = '<div class="alert alert-danger">Formando editado com sucesso!</div>';        
        echo '<script>setTimeout(function(){window.location.href="../view/' . $urlRetorno . '"},2000);</script>';
    }
}

$controller = new IntegranteController();
$res = $controller->selecionar($idIntegrante);
if(is_string($res)){
    $msg = $res;
}

?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Editar Formando</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?= $urlRetorno ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <form method="post" accept-charset="utf-8">

            <input type="hidden" name="id" value="<?=$idIntegrante?>">
            <input type="hidden" name="t" value="<?= $$target ?>">
            <input type="hidden" name="idComissao" value="<?=$res['id_comissao']?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<?=$res['nome']?>">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="<?=$res['telefone']?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control" required value="<?=$res['email']?>">
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control" required>
                    <option value="<?=$res['funcao']?>"><?=$res['funcao']?></option>
                    <option value="Formando">Formando</option>
                    <option value="Representante">Representante</option>
                </select>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" readonly class="form-control" required value="<?=$res['senha']?>">
            </div>

            <div class="form-group">
                <label>Informações para o convite</label>
                <textarea name="informacoesConvite" id="informacoesConvite" class="form-control"><?=$res['informacoes_convite']?></textarea>
            </div>

            <div class="form-group">
                <label>Mensagem Personalizada</label>
                <textarea name="mensagemPersonalizada" id="mensagemPersonalizada" class="form-control"><?=$res['mensagem_personalizada']?></textarea>
            </div>

            <p>
                <button class="btn btn-danger">Salvar</button>
            </p>

        </form>

    </div>
</div>
<script src="../view/integrante_editar.js"></script>