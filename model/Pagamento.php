<?php

namespace model;

class Pagamento{
    private $id;
    private $idIntegrante;
    private $descricao;
    private $valor;
    private $formaPagamento;
    private $dataVencimento;
    private $dataPagamento;
    private $statusPagamento;

    public function __construct($dto){
        $this->id = $dto->getId();
        $this->idIntegrante = $dto->getIdIntegrante();
        $this->descricao = $dto->getDescricao();
        $this->valor = $dto->getValor();
        $this->formaPagamento = $dto->getFormaPagamento();
        $this->dataVencimento = $dto->getDataVencimento();
        $this->dataPagamento = $dto->getDataPagamento();
        $this->statusPagamento = $dto->getStatusPagamento();
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