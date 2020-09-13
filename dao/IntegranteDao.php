<?php

namespace dao;

require_once '../dao/Connection.php';
require_once '../interfaces/IntegranteCrud.php';
require_once '../model/Integrante.php';

use interfaces\IntegranteCrud;
use model\Integrante;

class IntegranteDao implements IntegranteCrud{

    function incluir($dto){
        $msg = null;       
        $integrante = new Integrante($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'insert into integrantes ';
        $sql .= '(id_comissao,nome,telefone,email,funcao,senha,informacoes_convite,mensagem_personalizada) ';
        $sql .= 'values(?,?,?,?,?,?,?,?)';
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param(
            "isssssss",
            $idComissao,$nome,$telefone,$email,$funcao,$senha,$informacoesConvite,$mensagemPersonalizada
        );
        
        $nome = $integrante->getNome();
        $telefone = $integrante->getTelefone();
        $email = $integrante->getEmail();
        $funcao = $integrante->getFuncao();
        $senha = $integrante->getSenha();
        $idComissao = $integrante->getIdComissao();
        $informacoesConvite = $integrante->getInformacoesConvite();
        $mensagemPersonalizada = $integrante->getMensagemPersonalizada();

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

    function editar($dto){
        $msg = null;       
        $integrante = new Integrante($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'update integrantes set nome=?,telefone=?,email=?,funcao=?,informacoes_convite=?,';
        $sql .= 'mensagem_personalizada=? where id = ?';        
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param(
            "ssssssi",
            $nome,$telefone,$email,$funcao,$informacoesConvite,$mensagemPersonalizada,$id
        );
        
        $nome = $integrante->getNome();
        $telefone = $integrante->getTelefone();
        $email = $integrante->getEmail();
        $funcao = $integrante->getFuncao();        
        $informacoesConvite = $integrante->getInformacoesConvite();
        $mensagemPersonalizada = $integrante->getMensagemPersonalizada();
        $id = $integrante->getId();

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

    function remover($id){}

    function listar($busca){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from integrantes where id_comissao = ? or nome like ? order by nome";

        $stmt = $link->prepare($sql);
        $stmt->bind_param("is", $idComissao, $nome);
        
        $idComissao = $busca;
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

    function selecionar($id){
        $msg = null;
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = "select * from integrantes where id = ?";

        $stmt = $link->prepare($sql);
        $stmt->bind_param("i", $id);

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
        $sql = "select * from integrantes where email=? and senha=?";
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
}

?>