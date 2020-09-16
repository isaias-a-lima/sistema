<?php

namespace controller;

require_once '../dao/LinkDao.php';
require_once '../controller/EmpresaController.php';
require_once '../util/Arquivo.php';
require_once '../util/Email.php';

use dao\LinkDao;
use util\Arquivo;
use util\Email;

class LinkController{

    function incluir($dto){

        if(empty($dto->getIdFuncionario())){
            return '<div class="alert alert-danger">Id do Funcionario é obrigatório!</div>';
        }else if(empty($dto->getIdIntegrante())){
            return '<div class="alert alert-danger">Id do Integrante é obrigatório!</div>';        
        }else if(empty($dto->getDataEnvio())){
            return '<div class="alert alert-danger">Data de envio é obrigatório!</div>';
        }

        $arquivo = Arquivo::verifyFile($dto->getArquivo());

        if(is_string($arquivo)){
            return "<div class='alert alert-danger'>$arquivo</div>";
        }

        $dto->setNomeArquivo($arquivo['nome']);

        $dao = new LinkDao();
        $idLink = $dao->incluir($dto);

        if(is_string($idLink)){
            $msg = "<div class='alert alert-danger'>$idLink</div>";            
            return $msg;
        }
        
        if(is_numeric($idLink)){
            
            $empresa = EmpresaController::exibirEmpresa();
            $diretorio = '../' .$empresa->getLinksDir();
            $targetFile = $diretorio . $idLink . '_' . $dto->getIdIntegrante() . '_' . $dto->getNomeArquivo();
    
            $isUploaded = Arquivo::enviarArquivo($arquivo['tmp_name'],$targetFile);

            if($isUploaded){
                $paraEmail = $dto->getEmailIntegrante();
                $paraNome = $dto->getNomeIntegrante();
                $deNome = $dto->getNomeFuncionario();
                $email = new Email();                
                $res = $email->emailEnvioDeLink($paraEmail,$paraNome,$deNome,$targetFile);
                if($res){
                    return 2;
                }
                return 1;
            }else{
                $this->remover($idLink);
                return '<div class="alert alert-danger">Não foi possível enviar o link!</div>';
            }
        }
    }

    function remover($idLink){
        $dao = new LinkDao();
        $res = $dao->remover($idLink);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">Erro de sistema!</div>';
            $msg .= '<script>console.log('. $idLink .')</script>';
            return $msg;
        }
        return $res;
    }

    function selecionar($idLink){
        $dao = new LinkDao();
        $res = $dao->selecionar($idLink);
        if(is_string($res)){
            $msg = "<div class='alert alert-danger'>$res</div>";            
            return $msg;
        }
        $row = $res->fetch_array();
        return $row;
    }

    function listarPorIntegrante($idIntegrante){
        $dao = new LinkDao();
        $res = $dao->listarPorIntegrante($idIntegrante);
        if(is_string($res)){
            $msg = "<div class='alert alert-danger'>$res</div>";            
            return $msg;
        }
        return $res;
    }

}

?>