<?php

namespace model;

class Comissao{
    private $id;
    private $faculdade;
    private $curso;
    private $dataFormatura;
    private $dataInicioArte;
    private $dataLimiteAprovacao;
    private $dataPrevistaEntrega;
    private $enderecoEntrega;
    private $tempoAproxFrete;
    private $qtdInicialConvites;
    private $valorProjeto;
    private $statusProjeto;

    function __construct($dto)
    {
        $this->id = $dto->getId();
        $this->faculdade = $dto->getFaculdade();
        $this->curso = $dto->getCurso();
        $this->dataFormatura = $dto->getDataFormatura();
        $this->dataInicioArte = $dto->getDataInicioArte();
        $this->dataLimiteAprovacao = $dto->getDataLimiteAprovacao();
        $this->dataPrevistaEntrega = $dto->getDataPrevistaEntrega();
        $this->enderecoEntrega = $dto->getEnderecoEntrega();
        $this->tempoAproxFrete = $dto->getTempoAproxFrete();
        $this->qtdInicialConvites = $dto->getQtdInicialConvites();
        $this->valorProjeto = $dto->getValorProjeto();
        $this->statusProjeto = $dto->getStatusProjeto();
    }    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of faculdade
     */ 
    public function getFaculdade()
    {
        return $this->faculdade;
    }

    /**
     * Get the value of curso
     */ 
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Get the value of dataFormatura
     */ 
    public function getDataFormatura()
    {
        return $this->dataFormatura;
    }

    /**
     * Get the value of dataInicioArte
     */ 
    public function getDataInicioArte()
    {
        return $this->dataInicioArte;
    }

    /**
     * Get the value of dataLimiteAprovacao
     */ 
    public function getDataLimiteAprovacao()
    {
        return $this->dataLimiteAprovacao;
    }

    /**
     * Get the value of dataPrevistaEntrega
     */ 
    public function getDataPrevistaEntrega()
    {
        return $this->dataPrevistaEntrega;
    }

    /**
     * Get the value of enderecoEntrega
     */ 
    public function getEnderecoEntrega()
    {
        return $this->enderecoEntrega;
    }

    /**
     * Get the value of tempoAproxFrete
     */ 
    public function getTempoAproxFrete()
    {
        return $this->tempoAproxFrete;
    }

    /**
     * Get the value of qtdInicialConvites
     */ 
    public function getQtdInicialConvites()
    {
        return $this->qtdInicialConvites;
    }

    /**
     * Get the value of statusProjeto
     */ 
    public function getStatusProjeto()
    {
        return $this->statusProjeto;
    }

    /**
     * Get the value of valorProjeto
     */ 
    public function getValorProjeto()
    {
        return $this->valorProjeto;
    }
}

?>