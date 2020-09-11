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
}