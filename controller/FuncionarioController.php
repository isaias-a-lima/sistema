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
        if(is_string($res)){
            $msg = '<div class="alert alert-danger">Erro de sistema!</div>';
            $msg .= '<script>console.log('. $res .')</script>';
            return $res;
        }
        if(is_numeric($res)){
            $msg = '<div class="alert alert-danger">Usuário incluído com sucesso!</div>';
            $msg .= '<script>setTimeout(function(){window.location.href="../view/?p=flis"},2000);</script>';
            return $msg;
        }
        
    }

    public function editar($dto){
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
        if(empty($dto->getStatusFuncionario())){
            return 'Status é obrigatório!';
        }
        $funcDao = new FuncionarioDao();
        $res = $funcDao->editar($dto);
        if(is_string($res)){
            return $res;            
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível editar os dados!</div>';
            }else{
                $retorno = '<div class="alert alert-danger">Dados editados com sucesso!</div>';
                $retorno .= '<script>setTimeout(function(){window.location.href="../view/?p=flis"},2000);</script>';
                return $retorno;
            }
        }
    }

    public function alterarDados($dto){
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
        $funcDao = new FuncionarioDao();
        $res = $funcDao->alterarDados($dto);
        if(is_string($res)){
            return $res;            
        }
        if(is_numeric($res)){
            if($res < 1){
                return '<div class="alert alert-danger">Não foi possível alterar os dados!</div>';
            }else{
                $retorno = '<div class="alert alert-danger">Dados alterado com sucesso!</div>';
                $retorno .= '<script>setTimeout(function(){window.location.href="../view/?p=lf"},2000);</script>';
                return $retorno;
            }
        }
    }

    function remover($id){
        $funcDao = new FuncionarioDao();
        $res = $funcDao->remover($id);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível remover!</div>';
        }
        $retorno = '<div class="alert alert-danger">Usuário removido com sucesso!</div>';
        $retorno .= '<script>setTimeout(function(){window.location.href="../view/?p=flis"},2000);</script>';
        return $retorno;
    }

    function listar($busca){
        $funcDao = new FuncionarioDao();
        $res = $funcDao->listar($busca);
        if(is_string($res)){            
            return '<div class="alert alert-danger">Não foi possível listar os Usuários!</div>';
        }
        return $res;
    }

    function selecionar($dto){
        if(empty($dto->getId())){
            return 'Nenhum funcionário foi selecionado para consultar!';
        }
        $funcDao = new FuncionarioDao();
        $res = $funcDao->selecionar($dto);
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
                echo '<script>window.location.href="../view/?p=lo";</script>';
            }
        }
    }
}

?>