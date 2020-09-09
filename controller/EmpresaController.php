<?php

namespace controller;

use model\Empresa;

require_once '../model/Empresa.php';

class EmpresaController{

    function editarEmpresa($dados){
        $msg = '';
        $empresa = new Empresa();
        $msg = $empresa->setNome($dados['nome']);
        $msg = $empresa->setTelefone($dados['telefone']);
        $msg = $empresa->setEmailContato($dados['emailContato']);
        $msg = $empresa->setEmailFinanceiro($dados['emailFinanceiro']);
        $msg = $empresa->setEndereco($dados['endereco']);
        $msg = $empresa->setCnpj($dados['cnpj']);
        $msg = $empresa->setUrlSistema($dados['urlSistema']);
        if(is_string($msg)){
            return '<div class="alert alert-danger">' . $msg . '</div>';
        }else{
            echo '<script>setTimeout(function(){window.location.href="../view/?p=em"},2000);</script>';
            return '<div class="alert alert-danger">Empresa editada com sucesso!</div>';
        }
        
    }

    public static function exibirEmpresa(){
        $empresa = new Empresa();
        return $empresa;
    }
}

?>