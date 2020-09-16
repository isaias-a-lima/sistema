<?php

namespace dao;

require_once '../dao/Connection.php';
require_once '../model/Link.php';
use model\Link;

class LinkDao{

    function incluir($dto){
        $msg = null;
        $entity = new Link($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'insert into links (id_funcionario,id_integrante,nome_arquivo,descricao,data_envio) ';
        $sql .= 'values (?,?,?,?,?)';

        $stmt = $link->prepare($sql);
        $stmt->bind_param("iisss",$idFuncionario,$idIntegrante,$nomeArquivo,$descricao,$dataEnvio);

        $idFuncionario = $entity->getIdFuncionario();
        $idIntegrante = $entity->getIdIntegrante();
        $nomeArquivo = $entity->getNomeArquivo();
        $descricao = $entity->getDescricao();
        $dataEnvio = $entity->getDataEnvio();

        $stmt->execute();

        if($stmt->error){
            $msg = $sql . '<br>' . $stmt->error;
        }else{
            $msg = $stmt->insert_id;
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function remover($idLink){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'delete from links where id = ? ';       

        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$idLink);

        $stmt->execute();

        if($stmt->error){
            $msg = $sql . '<br>' . $stmt->error;
        }else{
            $msg = $stmt->affected_rows;
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function selecionar($idLink){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select l.id,l.id_funcionario,f.nome as fnome,l.id_integrante,i.nome as inome,i.id_comissao,l.nome_arquivo,l.descricao,l.data_envio ';
        $sql .= 'from links as l inner join funcionarios as f on f.id = l.id_funcionario ';
        $sql .= 'inner join integrantes as i on i.id = l.id_integrante ';
        $sql .= 'where l.id = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$idLink);

        $stmt->execute();

        if($stmt->error){
            $msg = $sql . '<br>' . $stmt->error;
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function listarPorIntegrante($idIntegrante){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select * from links where id_integrante = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$idIntegrante);

        $stmt->execute();

        if($stmt->error){
            $msg = $sql . '<br>' . $stmt->error;
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

}
?>