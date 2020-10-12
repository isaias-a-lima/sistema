<?php
$idIntegrante = isset($_SESSION['idSession']) ? $_SESSION['idSession'] : NULL ;
?>

<input type="hidden" id="idIntegrante" value="<?=$idIntegrante?>">

<div class="row">

    <div class="col-sm-12 col-md-6" style="min-height: 400px;">
        <h2><span class="glyphicon glyphicon-menu-hamburger"></span> Menu do Formando</h2>        

        <div class="menu">
            <h4><span class="glyphicon glyphicon-info-sign"></span> Informações Convite</h4>

            <button id="btn_info_conv" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </button>

            <button id="btn_info_edit" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
        </div>

        <div class="menu">
            <h4><span class="glyphicon glyphicon-pencil"></span> Mensagem Personalizada</h4>

            <button id="btn_fmp" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </button>

            <button id="btn_fmp_ed" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
        </div>

        <div class="menu">
            <h4><span class="glyphicon glyphicon-file"></span> Arquivos</h4>

            <button id="btn_comin" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-upload"></span> Enviar
            </button>

            <button id="btn_comin" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-list-alt"></span> Enviados
            </button>

            <button id="btn_comin" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-list-alt"></span> Recebidos
            </button>
        </div>

        <div class="menu">
            <h4><span class="glyphicon glyphicon-usd"></span> Pagamentos</h4>

            <button id="btn_pgt" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </button>
           
        </div>

        <div class="menu" style="display: none;">
            <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Atendimento</h4>

            <button id="btn_comin" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-eye-open"></span> Visualizar
            </button>

            <button id="btn_comin" type="button" class="btn btn-danger">
                <span class="glyphicon glyphicon-edit"></span> Editar
            </button>
        </div>
    </div>
</div>
<script src="../view/formando_menu.js"></script>