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
        $sql .= '(nome,telefone,email,funcao,senha,statusFuncionario) ';
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

    function listar(){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from funcionarios order by nome";
        $res = $link->query($sql);
        if($res->num_rows > 0){
            $msg = $res;
        }else{
            $msg = "ERRO: " . $link->error . "<br>" . $sql;
        }
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