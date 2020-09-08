<?php
$idComissao = isset($_GET['ic']) ? $_GET['ic'] : 0;
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : 0;

$urlRetorno = ($idComissao > 0) ? '?p=comvis&ic=' . $idComissao : '?p=ilis';

$msg = '';

require_once '../controller/IntegranteController.php';

use controller\IntegranteController;

$integrante = new IntegranteController();
    $res = $integrante->selecionar($idIntegrante);
    if(is_string($res)){
        $msg = $res;
    }
?>

<div class="row">
    <div class="col-sm-12 col-md-6" style="min-height: 400px;">

        <h2><span class="glyphicon glyphicon-education"></span> Formando</h2>

        <ul class="pager">
            <li class="previous"><a href="../view/<?=$urlRetorno?>">Voltar</a></li>
        </ul>

        <?= $msg ?>

        <p>
            <button id="btn_ied" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span>
                Editar
            </button>
        </p>

        <table class="table">
            <tr>
                <th>Nome</th>
            </tr>
            <tr>
                <td><?=$res['nome']?></td>
            </tr>

            <tr>
                <th>Telefone</th>
            </tr>
            <tr>
                <td><?=$res['telefone']?></td>
            </tr>

            <tr>
                <th>E-mail</th>
            </tr>
            <tr>
                <td><?=$res['email']?></td>
            </tr>
            <tr>
                <th>Função</th>
            </tr>
            <tr>
                <td><?=$res['funcao']?></td>
            </tr>

            <tr>
                <th>Informações convite</th>
            </tr>
            <tr>
                <td><?=$res['informacoes_convite']?></td>
            </tr>

            <tr>
                <th>Mensagem personalizada</th>
            </tr>
            <tr>
                <td><?=$res['mensagem_personalizada']?></td>
            </tr>

            <tr>
                <th>Arquivos</th>
            </tr>
            <tr>
                <td></td>
            </tr>

            <tr>
                <th>Pagamento</th>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>

    </div>
</div>