<?php

namespace Controller;

require_once '../dao/FuncionarioDao.php';

use dao\FuncionarioDao;

class FuncionarioController{
    
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
        $funcDao = new FuncionarioDao();
        $res = $funcDao->incluir($dto);
        return $res;
    }

    function listar(){
        $funcDao = new FuncionarioDao();
        $res = $funcDao->listar();
        return $res;
    }

    function selecionar($dto){
        if(empty($dto->getId())){
            return 'Nenhum funcionário foi selecionado para consultar!';
        }
        $funcDao = new FuncionarioDao();
        $res = $funcDao->selecionar($dto);
        if(is_string($res)){
            return '<span class="alert alert-danger">ERRO: ' . $res . '</span>';
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
        $funcDao = new FuncionarioDao();
        $res = $funcDao->logar($dto);

        if(is_array($res) || is_object($res)){

            $row = $res->fetch_array();
            if(!empty($row['nome'])){
                session_start();
                $_SESSION['idSession'] = $row['id'];
                $_SESSION['nomeSession'] = $row['nome'];
                $_SESSION['emailSession'] = $row['email'];
                $_SESSION['funcaoSession'] = 'Funcionario';
                return true;
            }else{
                return 'Verifique seu usuário e senha!';
            }

        }
        return $res;
    }

    function logout(){
        session_unset();
        session_destroy();
        if(!isset($_SESSION['nomeSession'])){
            return true;
        }        
    }

    function mudarSenha($dto, $senhaNova){
        if(empty($dto->getId()) || empty($dto->getSenha()) || empty($senhaNova)){
            return 'ERRO: Dados obrigatórios não foram informados!';
        }        
        $dao = new FuncionarioDao();
        $res = $dao->mudarSenha($dto,$senhaNova);
        if(is_string($res)){
            return $res;            
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível mudar a senha! Verifique os dados digitados!</div>';
            }else{
                header('Location:../view/?p=lo');
            }
        }
    }
}

?>