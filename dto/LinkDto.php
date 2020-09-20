<?php

namespace dto;

class LinkDto{

    private $id;
    private $idFuncionario;
    private $idComissao;
    private $idIntegrante;
    private $arquivo;
    private $nomeArquivo;
    private $descricao;
    private $dataEnvio;
    private $nomeIntegrante;
    private $emailIntegrante;
    private $nomeFuncionario;

    public function __construct($link)
    {
        $this->id = isset($link['id']) ? $link['id'] : '';
        $this->idFuncionario = isset($link['idFuncionario']) ? $link['idFuncionario']: '';
        $this->idComissao = isset($link['idComissao']) ? $link['idComissao']: '';
        $this->idIntegrante = isset($link['idIntegrante']) ? $link['idIntegrante'] : '';
        
        $this->descricao = isset($link['descricao']) ? $link['descricao'] : '';
        $this->dataEnvio = isset($link['dataEnvio']) ? $link['dataEnvio'] : '';
        $this->nomeIntegrante = isset($link['nomeIntegrante']) ? $link['nomeIntegrante'] : '';
        $this->emailIntegrante = isset($link['emailIntegrante']) ? $link['emailIntegrante'] : '';
        $this->nomeFuncionario = isset($link['nomeFuncionario']) ? $link['nomeFuncionario'] : '';
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
    
    public function getArquivo()
    {
        return $this->arquivo;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setNomeArquivo($nomeArquivo)
    {
        $this->nomeArquivo = $nomeArquivo;
    }
    
    public function setArquivo($arquivo)
    {
        $this->arquivo = $arquivo;
    }

    public function getNomeIntegrante()
    {
        return $this->nomeIntegrante;
    }

    public function getEmailIntegrante()
    {
        return $this->emailIntegrante;
    }

    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
    }
    
    public function getIdComissao()
    {
        return $this->idComissao;
    }
}
?>