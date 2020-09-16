<?php
$idComissao = isset($_GET['ic']) ? $_GET['ic'] : 0;
$idIntegrante = isset($_GET['id']) ? $_GET['id'] : 0;

$urlRetorno = ($idComissao > 0) ? '?p=comvis&ic=' . $idComissao : '?p=ilis';

$msg = '';

require_once '../controller/IntegranteController.php';
require_once '../controller/LinkController.php';
require_once '../controller/EmpresaController.php';

use controller\EmpresaController;
use controller\IntegranteController;
use controller\LinkController;

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
            <input type="hidden" id="idIntegrante" value="<?=$idIntegrante?>">
            <input type="hidden" id="idComissao" value="<?=$idComissao?>">
            <input type="hidden" id="idIntegrante" value="<?=$idIntegrante?>">
            <input type="hidden" id="idComissao" value="<?=$idComissao?>">

            <button id="btn_el" class="btn btn-danger">
                <span class="glyphicon glyphicon-link"></span>
                Enviar Link
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
                <th>Links Enviados</th>
            </tr>
            <tr>
                <td>
                    <?php
                    $empresa = EmpresaController::exibirEmpresa();
                    $urlSistema = $empresa->getUrlSistema();
                    $linksDir = $empresa->getLinksDir();
                    $urlLink = '';

                    $link = new LinkController();
                    $links = $link->listarPorIntegrante($idIntegrante);
                    if(is_string($links)){
                        echo 'ERRO: ' . $links;
                    }else{                        
                        echo '<table class="tabela">';
                        while($row = $links->fetch_assoc()){
                            $urlLink = $urlSistema . $linksDir . $row['id'] .'_' . $row['id_integrante'] . '_' . $row['nome_arquivo'];
                            $dataEnvio = date('d/m/Y H:i', strtotime($row['data_envio']));
                            echo '<tr>';
                            echo '<td>' . $row['nome_arquivo'] . '</td>';
                            echo '<td>'. $dataEnvio .'</td>';
                            echo '<td><a href="../view/?p=lvis&idl='.$row['id'].'"><span class="glyphicon glyphicon-eye-open"></span></a></td>';                            
                            echo '<td><a href="'.$urlLink.'" target="_new"><span class="glyphicon glyphicon-download"></span></a></td>';                            
                            echo '</tr>';
                        }
                        echo '</table>';
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <th>Arquivos Recebidos</th>
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
<script src="../view/integrante_visao.js"></script>