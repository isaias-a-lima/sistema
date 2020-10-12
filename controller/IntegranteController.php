<?php

namespace controller;

require_once '../interfaces/IntegranteCrud.php';
require_once '../model/Integrante.php';
require_once '../dao/IntegranteDao.php';
require_once '../util/Email.php';

use interfaces\IntegranteCrud;
use model\Integrante;
use util\Email;
use dao\IntegranteDao;

class IntegranteController implements IntegranteCrud{

    function incluir($dto){
        if(empty($dto->getNome())){
            return 'Nome é obrigatório!';
        }
        if(empty($dto->getEmail())){
            return 'E-mail é obrigatório!';
        }
        if(empty($dto->getFuncao())){
            return 'Função é obrigatório!';
        }
        if(empty($dto->getSenha())){
            return 'Senha é obrigatório!';
        }
        $dao = new IntegranteDao();
        $res = $dao->incluir($dto);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">Erro de sistema!</div>';
            $msg .= '<script>console.log('. $res .')</script>';
            return $res;
        }
        if(is_numeric($res)){
            $email = new Email();
            $resEmail = $email->emailCadastroIntegrante($dto->getEmail(),$dto->getNome(),$dto->getSenha());
            echo "<script>alert('$resEmail')</script>";
            return $res;
        }
    }

    function editar($dto){
        if(empty($dto->getNome())){
            return 'Nome é obrigatório!';
        }
        if(empty($dto->getEmail())){
            return 'E-mail é obrigatório!';
        }
        if(empty($dto->getFuncao())){
            return 'Função é obrigatório!';
        }        
        if(empty($dto->getId())){
            return 'Id é obrigatório!';
        }
        $dao = new IntegranteDao();
        $res = $dao->editar($dto);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível editar Formando!</div>';
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível editar os dados!</div>';
            }
            return $res;
        }
    }

    function remover($id){}

    function listar($busca){
        $dao = new IntegranteDao();
        $res = $dao->listar($busca);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível listar os Integrantes!</div>';
        }
        return $res;
    }

    function selecionar($id){
        $dao = new IntegranteDao();
        $res = $dao->selecionar($id);
        if(is_string($res)){
            return '<div class="alert alert-danger">ERRO: ' . $res . '</div>';
        }
        $res = $res->fetch_array();
        return $res;
    }

    function logar($dto){

        if(empty($dto->getEmail())){
            return 'E-mail é obrigatório!';
        }
        if(empty($dto->getSenha())){
            return 'Senha é obrigatório!';
        }
        $dao = new IntegranteDao();
        $res = $dao->logar($dto);

        if(is_array($res) || is_object($res)){

            $row = $res->fetch_array();
            if(!empty($row['nome'])){                
                $_SESSION['idSession'] = $row['id'];
                $_SESSION['nomeSession'] = $row['nome'];
                $_SESSION['emailSession'] = $row['email'];
                $_SESSION['funcaoSession'] = 'Formando';
                return true;
            }else{
                return 'Verifique seu usuário e senha!';
            }

        }
        return $res;
    }

    function listarPorComissao($idComissao){
        $dao = new IntegranteDao();
        $res = $dao->listarPorComissao($idComissao);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível listar os Integrantes!</div>';
        }
        return $res;
    }

    function editarInformacoesConvite($idIntegrante,$informacoesConvite){
            
        if(empty($idIntegrante)){
            return 'Id é obrigatório!';
        }
        if(empty($informacoesConvite)){
            return 'Informações Convite é obrigatório!';
        }
        
        $dao = new IntegranteDao();
        $res = $dao->editarInformacoesConvite($idIntegrante,$informacoesConvite);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível editar Informações Convite!</div>';
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível editar os dados!</div>';
            }
            return $res;
        }
    }

    function editarMensagemPersonalizada($idIntegrante,$mensagemPersonalizada){
            
        if(empty($idIntegrante)){
            return 'Id é obrigatório!';
        }
        if(empty($mensagemPersonalizada)){
            return 'Mensagem Personalizada é obrigatório!';
        }
        
        $dao = new IntegranteDao();
        $res = $dao->editarMensagemPersonalizada($idIntegrante,$mensagemPersonalizada);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível editar a Mensagem Personalizada!</div>';
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível editar a Mensagem Personalizada!</div>';
            }
            return $res;
        }
    }
}