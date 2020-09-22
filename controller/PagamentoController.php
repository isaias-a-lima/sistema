<?php

namespace controller;

require_once '../interfaces/PagamentoCrud.php';
require_once '../dao/PagamentoDao.php';

use dao\PagamentoDao;
use interfaces\PagamentoCrud;

class PagamentoController implements PagamentoCrud{

    function incluir($dto){
        $dao = new PagamentoDao();
        $res = $dao->incluir($dto);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">'. $res .'</div>';            
            return $msg;
        }
        return $res;
    }

    function editar($dto){}

    function remover($id){}

    function selecionar($id){
        $dao = new PagamentoDao();
        $res = $dao->selecionar($id);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">'. $res .'</div>';            
            return $msg;
        }
        return $res;
    }

    function listar($dtVencInicio,$dtVencFim,$statusPagamento){
        $dao = new PagamentoDao();
        $res = $dao->listar($dtVencInicio,$dtVencFim,$statusPagamento);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">'. $res .'</div>';            
            return $msg;
        }
        return $res;
    }

    function selecionarPorIntegrante($idIntegrante){
        $dao = new PagamentoDao();
        $res = $dao->selecionarPorIntegrante($idIntegrante);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">'. $res .'</div>';            
            return $msg;
        }
        return $res;
    }

    function selecionarPorComissao($idComissao){
        $dao = new PagamentoDao();
        $res = $dao->selecionarPorComissao($idComissao);
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">'. $res .'</div>';            
            return $msg;
        }
        return $res;
    }
}

?>