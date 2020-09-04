<?php

namespace dao;

require_once '../interfaces/IntegranteCrud.php';
require_once '../model/Integrante.php';
require_once '../dao/IntegranteDao.php';

use interfaces\IntegranteCrud;
use model\Integrante;

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
            return $res;
        }
    }

    function editar($dto){}

    function remover($id){}

    function listar($busca){
        $dao = new IntegranteDao();
        $res = $dao->listar($busca);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível listar os Integrantes!</div>';
        }
        return $res;
    }

    function selecionar($id){}
}