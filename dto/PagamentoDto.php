<?php

namespace dto;

class PagamentoDto{
    private $id;
    private $idIntegrante;
    private $descricao;
    private $valor;
    private $formaPagamento;
    private $dataVencimento;
    private $dataPagamento;
    private $statusPagamento;

    public function __construct($dados){
        $this->id = isset($dados['id']) ? $dados['id'] : 0 ;
        $this->idIntegrante = isset($dados['idIntegrante']) ? $dados['idIntegrante'] : 0 ;
        $this->descricao = isset($dados['descricao']) ? $dados['descricao'] : '' ;
        $this->valor = isset($dados['valor']) ? $dados['valor'] : 0 ;
        $this->formaPagamento = isset($dados['formaPagamento']) ? $dados['formaPagamento'] : '' ;
        $this->dataVencimento = (isset($dados['dataVencimento']) && !empty($dados['dataVencimento'])) ? $dados['dataVencimento'] : NULL ;
        $this->dataPagamento = (isset($dados['dataPagamento']) && !empty($dados['dataPagamento'])) ? $dados['dataPagamento'] : NULL ;
        $this->statusPagamento = isset($dados['statusPagamento']) ? $dados['statusPagamento'] : '' ;
    }
    
    public function getId()
    {
        return $this->id;
    }
 
    public function getIdIntegrante()
    {
        return $this->idIntegrante;
    }
 
    public function getDescricao()
    {
        return $this->descricao;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getFormaPagamento()
    {
        return $this->formaPagamento;
    }

    public function getStatusPagamento()
    {
        return $this->statusPagamento;
    }
 
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    public function getDataPagamento()
    {
        return $this->dataPagamento;
    }
}
?>