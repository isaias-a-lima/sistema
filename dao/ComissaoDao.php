<?php

namespace dao;

require_once '../interfaces/ComissaoCrud.php';
require_once '../dao/Connection.php';
require_once '../model/Comissao.php';

use interfaces\ComissaoCrud;
use model\Comissao;



class ComissaoDao implements ComissaoCrud{
    public function incluir($dto){
        $msg = null;
        $comissao = new Comissao($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'insert into comissoes ';
        $sql .= '(faculdade,curso,data_formatura,data_inicio_arte,data_limite_aprovacao,data_prevista_entrega,';
        $sql .= 'endereco_entrega,tempo_aprox_frete,qtd_inicial_convites,valor_projeto,status_projeto)';
        $sql .= 'values(?,?,?,?,?,?,?,?,?,?,?)';
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param(
            "sssssssiids",
            $faculdade,$curso,$dataFormatura,$dataInicioArte,$dataLimiteAprovacao,$dataPrevistaEntrega,
            $enderecoEntrega,$tempoAproxFrete,$qtdInicialConvites,$valorProjeto,$statusProjeto
        );

        $faculdade = $comissao->getFaculdade();
        $curso = $comissao->getCurso();
        $dataFormatura = $comissao->getDataFormatura();
        $dataInicioArte = $comissao->getDataInicioArte();
        $dataLimiteAprovacao = $comissao->getDataLimiteAprovacao();
        $dataPrevistaEntrega = $comissao->getDataPrevistaEntrega();
        $enderecoEntrega = $comissao->getEnderecoEntrega();
        $tempoAproxFrete = $comissao->getTempoAproxFrete();
        $qtdInicialConvites = $comissao->getQtdInicialConvites();
        $valorProjeto = $comissao->getValorProjeto();
        $statusProjeto = $comissao->getStatusProjeto();        

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

    function editar($dto){
        $msg = null;
        $comissao = new Comissao($dto);
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'update comissoes set faculdade=?,curso=?,data_formatura=?,data_inicio_arte=?,';
        $sql .= 'data_limite_aprovacao=?,data_prevista_entrega=?,endereco_entrega=?,tempo_aprox_frete=?,';
        $sql .= 'qtd_inicial_convites=?,valor_projeto=?,status_projeto=? where id = ?';       
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param(
            "sssssssiidsi",
            $faculdade,$curso,$dataFormatura,$dataInicioArte,$dataLimiteAprovacao,$dataPrevistaEntrega,
            $enderecoEntrega,$tempoAproxFrete,$qtdInicialConvites,$valorProjeto,$statusProjeto,$id
        );

        $faculdade = $comissao->getFaculdade();
        $curso = $comissao->getCurso();
        $dataFormatura = $comissao->getDataFormatura();
        $dataInicioArte = $comissao->getDataInicioArte();
        $dataLimiteAprovacao = $comissao->getDataLimiteAprovacao();
        $dataPrevistaEntrega = $comissao->getDataPrevistaEntrega();
        $enderecoEntrega = $comissao->getEnderecoEntrega();
        $tempoAproxFrete = $comissao->getTempoAproxFrete();
        $qtdInicialConvites = $comissao->getQtdInicialConvites();
        $valorProjeto = $comissao->getValorProjeto();
        $statusProjeto = $comissao->getStatusProjeto();
        $id = $comissao->getId();        

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

    function remover($id){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'update comissoes set status_projeto="Cancelado" where id = ?';       
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("i", $id);

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

    function listar($busca){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select * from comissoes where id = ? and status_projeto != "Cancelado" ';       
        $sql .= 'or faculdade like ? and status_projeto != "Cancelado" ';
        $sql .= 'or curso like ? and status_projeto != "Cancelado"';
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("iss", $id, $faculdade, $curso);
        $id = $busca;
        $faculdade = $curso = '%' . $busca . '%';
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

    function selecionar($id){
        $msg = null;        
        $conn = new Connection();
        $link = $conn->getConn();
        $sql = 'select * from comissoes where id = ?';       
        
        $stmt = $link->prepare($sql);        
        $stmt->bind_param("i",$id);

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