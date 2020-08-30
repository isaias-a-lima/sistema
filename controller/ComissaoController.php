<?php

namespace Controller;

require_once '../interfaces/ComissaoCrud.php';
require_once '../dao/ComissaoDao.php';

use interfaces\ComissaoCrud;
use dao\ComissaoDao;

class ComissaoController implements ComissaoCrud{

    function incluir($dto){

        if(empty($dto->getFaculdade())){
            return '<div class="alert alert-danger">Faculdade é obrigatório!</div>';
        }
        if(empty($dto->getCurso())){
            return '<div class="alert alert-danger">Curso é obrigatório!</div>';
        }
        if(!empty($dto->getValorProjeto())){
            if(!is_numeric($dto->getValorProjeto())){
                return '<div class="alert alert-danger">Valor do projeto tem que ser um número válido!</div>';
            }
        }
        $dao = new ComissaoDao();
        $res = $dao->incluir($dto);
        if(is_string($res)){
            echo '<script>console.log('. $res .')</script>';
            return '<div class="alert alert-danger">ERRO: Não foi possível incluir Comissão!</div>';
        }
        if(is_numeric($res)){
            if($res < 1 || $res == null){
                return '<div class="alert alert-danger">Não foi possível incluir Comissão!</div>';
            }
            echo '<script>setTimeout(function(){window.location.href="../view/?p=comlis"},2000);</script>';
            return '<div class="alert alert-danger">Comissão incluída com sucesso!</div>';
        }
    }

    function editar($dto){

        if(empty($dto->getId())){
            return '<div class="alert alert-danger">Id é obrigatório!</div>';
        }
        if(empty($dto->getFaculdade())){
            return '<div class="alert alert-danger">Faculdade é obrigatório!</div>';
        }
        if(empty($dto->getCurso())){
            return '<div class="alert alert-danger">Curso é obrigatório!</div>';
        }
        if(!empty($dto->getValorProjeto())){
            if(!is_numeric($dto->getValorProjeto())){
                return '<div class="alert alert-danger">Valor do projeto tem que ser um número válido!</div>';
            }
        }
        $dao = new ComissaoDao();
        $res = $dao->editar($dto);
        if(is_string($res)){
            echo '<script>console.log('. $res .')</script>';
            return '<div class="alert alert-danger">Erro de sistema!</div>';
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível editar Comissão!</div>';
            }
            echo '<script>setTimeout(function(){window.location.href="../view/?p=comlis"},2000)</script>';
            return '<div class="alert alert-danger">Comissão editada com sucesso!</div>';
        }
    }

    function remover($id){
        if(empty($id)){
            return '<div class="alert alert-danger">Id é obrigatório!</div>';
        }
        $dao = new ComissaoDao();
        $res = $dao->remover($id);
        if(is_string($res)){
            echo '<script>console.log('. $res .')</script>';
            return '<div class="alert alert-danger">Erro de sistema!</di>';
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível cancelar Comissão!</div>';
            }
            $msg = '<div class="alert alert-danger">Comissão cancelada com sucesso!</div>';
            $msg .= '<script>setTimeout(function(){window.location.href="../view/?p=comlis"},2000)</script>';
            
            return $msg;
        }
    }

    function listar($busca){        
        $dao = new ComissaoDao();
        $res = $dao->listar($busca);
        if(is_string($res)){
            echo '<script>console.log('. $res .')</script>';
            return '<div class="alert alert-danger">ERRO: Não foi possível consultar Comissões!</div>';
        }
        if(is_array($res) || is_object($res)){
            return $res;
        }

    }

    function selecionar($id){

        $dao = new ComissaoDao();
        $res = $dao->selecionar($id);
        if(is_string($res)){
            echo '<script>console.log('. $res .')</script>';
            return 'ERRO: Não foi possível consultar Comissões!';
        }
        if(is_array($res) || is_object($res)){
            $row = $res->fetch_array();
            return $row;
        }
    }

}

?>