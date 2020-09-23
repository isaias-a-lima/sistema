<?php

namespace dao;

require_once '../dao/Connection.php';
require_once '../interfaces/PagamentoCrud.php';
require_once '../model/Pagamento.php';

use interfaces\PagamentoCrud;
use model\Pagamento;

class PagamentoDao implements PagamentoCrud{

    function incluir($dto){
        $msg = null;
        $pgt = new Pagamento($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'insert into pagamentos (id_integrante,descricao,valor,forma_pagamento,';
        $sql .= 'data_vencimento,data_pagamento,status_pagamento) ';
        $sql .= 'values (?,?,?,?,?,?,?)';

        $stmt = $link->prepare($sql);
        $stmt->bind_param(
            "isdssss",
            $idIntegrante,$descricao,$valor,$formaPagamento,$dataVencimento,$dataPagamento,$statusPagamento);

        $idIntegrante = $pgt->getIdIntegrante();
        $descricao = $pgt->getDescricao();
        $valor = $pgt->getValor();
        $formaPagamento = $pgt->getFormaPagamento();
        $dataVencimento = $pgt->getDataVencimento();
        $dataPagamento = $pgt->getDataPagamento();
        $statusPagamento = $pgt->getStatusPagamento();

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->insert_id;
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function editar($dto){
        $msg = null;
        $pgt = new Pagamento($dto);
        $conn = new Connection();
        $link = $conn->getConn();

        $sql = 'update pagamentos set descricao=?,valor=?,forma_pagamento=?,';
        $sql .= 'data_vencimento=?,data_pagamento=?,status_pagamento=? ';
        $sql .= 'where id=?';        

        $stmt = $link->prepare($sql);
        $stmt->bind_param(
            "sdssssi",
            $descricao,$valor,$formaPagamento,$dataVencimento,$dataPagamento,$statusPagamento,$id);
        
        $descricao = $pgt->getDescricao();
        $valor = $pgt->getValor();
        $formaPagamento = $pgt->getFormaPagamento();
        $dataVencimento = $pgt->getDataVencimento();
        $dataPagamento = $pgt->getDataPagamento();
        $statusPagamento = $pgt->getStatusPagamento();
        $id = $pgt->getId();

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->affected_rows;
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function remover($id){}

    function selecionar($id){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select p.id,p.id_integrante,p.descricao,p.valor,p.forma_pagamento,';
        $sql .= 'p.data_vencimento,p.data_pagamento,p.status_pagamento,';
        $sql .= 'i.nome as inome,i.id_comissao from pagamentos as p ';
        $sql .= 'inner join integrantes as i on i.id = p.id_integrante ';
        $sql .= 'where p.id = ?';

        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$id);        

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function listar($dtVencInicio,$dtVencFim,$statusPagamento){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select p.id,p.id_integrante,p.descricao,p.valor,p.forma_pagamento,';
        $sql .= 'p.data_vencimento,p.data_pagamento,p.status_pagamento,';
        $sql .= 'i.nome as inome,i.id_comissao from pagamentos as p ';
        $sql .= 'inner join integrantes as i on i.id = p.id_integrante ';
        $sql .= 'where p.status_pagamento LIKE ? and p.data_vencimento between ? and ? ';
        $sql .= 'order by p.data_vencimento';

        $stmt = $link->prepare($sql);
        $stmt->bind_param("sss",$statusPagamento,$dtVencInicio,$dtVencFim);

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function selecionarPorIntegrante($idIntegrante){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();        
        $sql = 'select p.id,p.id_integrante,p.descricao,p.valor,p.forma_pagamento,p.status_pagamento,';
        $sql .= 'i.nome as inome,i.id_comissao from pagamentos as p ';
        $sql .= 'inner join integrantes as i on i.id = p.id_integrante ';
        $sql .= 'where p.id_integrante=?';
        
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$idIntegrante);

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }

    function selecionarPorComissao($idComissao){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();        
        $sql = 'select p.id,p.id_integrante,p.descricao,p.valor,p.forma_pagamento,p.status_pagamento,';
        $sql .= 'i.nome as inome,i.id_comissao from pagamentos as p ';
        $sql .= 'inner join integrantes as i on i.id = p.id_integrante ';
        $sql .= 'where i.id_comissao=?';
        
        $stmt = $link->prepare($sql);
        $stmt->bind_param("i",$idComissao);

        $stmt->execute();

        if($stmt->error){
            $msg = 'SQL(' . $sql . ')<br>';
            $msg .=  'ERRO(' . $stmt->error . ')';
        }else{
            $msg = $stmt->get_result();
        }

        $stmt->close();
        $conn->closeConn();
        
        return $msg;
    }
}

?>