<?php

namespace dao;

require_once '../dao/Connection.php';
require_once '../model/Funcionario.php';

use dao\Connection;
use model\Funcionario;

class FuncionarioDao{    

    public function incluir($funcionarioDto){
        $msg = null;       
        $funcionario = new Funcionario($funcionarioDto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'insert into funcionarios ';
        $sql .= '(nome,telefone,email,funcao,senha,status_funcionario) ';
        $sql .= 'values(?,?,?,?,?,?)';
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("ssssss",$nome,$telefone,$email,$funcao,$senha,$status);
        
        $nome = $funcionario->getNome();
        $telefone = $funcionario->getTelefone();
        $email = $funcionario->getEmail();
        $funcao = $funcionario->getFuncao();
        $senha = $funcionario->getSenha();
        $status = $funcionario->getStatusFuncionario();

        $stmt->execute();        

        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->insert_id;
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    public function editar($dto){
        $msg = null;       
        $funcionario = new Funcionario($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'update funcionarios set nome=?,telefone=?,email=?,funcao=?,status_funcionario=? where id=?';        
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("ssssss",$nome,$telefone,$email,$funcao,$statusFuncionario,$id);
        
        $nome = $funcionario->getNome();
        $telefone = $funcionario->getTelefone();
        $email = $funcionario->getEmail();
        $funcao = $funcionario->getFuncao();
        $statusFuncionario = $funcionario->getStatusFuncionario();
        $id = $funcionario->getId();        

        $stmt->execute();        

        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->affected_rows;
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    public function alterarDados($dto){
        $msg = null;       
        $funcionario = new Funcionario($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'update funcionarios set nome=?,telefone=?,email=?,funcao=? where id=?';        
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("sssss",$nome,$telefone,$email,$funcao,$id);
        
        $nome = $funcionario->getNome();
        $telefone = $funcionario->getTelefone();
        $email = $funcionario->getEmail();
        $funcao = $funcionario->getFuncao();
        $id = $funcionario->getId();        

        $stmt->execute();        

        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->affected_rows;
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    function remover($id){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "update funcionarios set status_funcionario='Removido' where id=?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$id);
        $stmt->execute();
        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->affected_rows;
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    function listar($busca){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from funcionarios where nome like ? and status_funcionario != 'Removido' order by nome";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("s",$nome);
        $nome = '%' . $busca . '%';
        $stmt->execute();
        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->get_result();
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    function selecionar($dto){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from funcionarios where id=?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$id);
        $id = $dto->getId();
        $stmt->execute();
        if($stmt->error){
            $msg = $stmt->error;
        }else{
            $msg = $stmt->get_result();
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    function logar($dto){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from funcionarios where email=? and senha=?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("ss",$email,$senha);

        $email = $dto->getEmail();
        $senha = $dto->getSenha();

        $stmt->execute();

        if($stmt->error){
            $msg = $stmt->error . '<br>' . $sql;
        }else{
            $msg = $stmt->get_result();
        }
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }

    function mudarSenha($dto,$senhaNova){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "update funcionarios set senha=? where id=? and senha=?";
        $stmt = $link->prepare($sql);
        $stmt->bind_param("sis",$senhaNova,$id,$senhaAtual);

        $id = $dto->getId();
        $senhaAtual = $dto->getSenha();

        $stmt->execute();

        if($stmt->error){
            $msg = 'ERRO: ' . $stmt->error . '<br>' . $sql;
        }else{
            $msg = $stmt->affected_rows;
        }
        
        $stmt->close();
        $conn->closeConn();
        return $msg;
    }
}
?>