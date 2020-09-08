<?php

use controller\IntegranteController;
use dto\IntegranteDto;

$msg = '';
$urlRetorno = isset($_GET['t']) ? $_GET['t'] : '';
$idComissao = isset($_GET['ic']) ? $_GET['ic'] : '';

if (isset($_POST['nome'])) {
    require_once '../controller/IntegranteController.php';
    require_once '../dto/IntegranteDto.php';

    $dto = new IntegranteDto($_POST);
    $controller = new IntegranteController();
    $res = $controller->incluir($dto);
    if (is_string($res)) {
        $msg = $res;
    }
    if (is_numeric($res)) {
        $msg = '<div class="alert alert-danger">Integrante incluído com sucesso!</div>';        
        echo '<script>setTimeout(function(){window.location.href="../view/?p=' . $urlRetorno . '&ic=' . $idComissao . '"},2000);</script>';
    }
}
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-briefcase"></span> Novo Integrante da Comissão</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/?p=<?= $urlRetorno ?>&ic=<?= $idComissao ?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <form method="post" accept-charset="utf-8">

            <input type="hidden" name="id" value="">
            <input type="hidden" name="t" value="<?= $urlRetorno ?>">
            <input type="hidden" name="idComissao" value="<?= $idComissao ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label><br>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="funcao">Função</label>
                <select name="funcao" id="funcao" class="form-control" required>
                    <option value="">...Escolha</option>
                    <option value="Formando">Formando</option>
                    <option value="Representante">Representante</option>
                </select>
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="text" name="senha" id="senha" readonly class="form-control" required>
            </div>

            <div class="form-group">
                <label>Informações para o convite</label>
                <textarea name="informacoesConvite" id="informacoesConvite" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Mensagem Personalizada</label>
                <textarea name="mensagemPersonalizada" id="mensagemPersonalizada" class="form-control"></textarea>
            </div>

            <p>
                <button class="btn btn-danger">Salvar</button>
            </p>

        </form>

    </div>
</div>
<script src="../view/integrante_incluir.js"></script>