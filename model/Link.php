<?php

namespace model;

class Link{

    private $id;
    private $idFuncionario;
    private $idIntegrante;
    private $nomeArquivo;
    private $descricao;
    private $dataEnvio;

    public function __construct($dto)
    {
        $this->id = $dto->getId();
        $this->idFuncionario = $dto->getIdFuncionario();
        $this->idIntegrante = $dto->getIdIntegrante();
        $this->nomeArquivo = $dto->getNomeArquivo();
        $this->descricao = $dto->getDescricao();
        $this->dataEnvio = $dto->getDataEnvio();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    public function getIdIntegrante()
    {
        return $this->idIntegrante;
    }

    public function getDataEnvio()
    {
        return $this->dataEnvio;
    }

    
    public function getNomeArquivo()
    {
        return $this->nomeArquivo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
}
?>