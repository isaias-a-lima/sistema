<?php

namespace dto;

require_once '../dto/PessoaDto.php';
use dto\PessoaDto;

class IntegranteDto extends PessoaDto{

    private $id;
    private $idComissao;
    private $informacoesConvite;
    private $mensagemPersonalizada;    

    public function __construct($pessoa){
        parent::__construct($pessoa);
        $this->id = $pessoa['id'];
        $this->idComissao = $pessoa['idComissao'];
        $this->informacoesConvite = $pessoa['informacoesConvite'];
        $this->mensagemPersonalizada = $pessoa['mensagemPersonalizada'];
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getIdComissao()
    {
        return $this->idComissao;
    }
     
    public function getInformacoesConvite()
    {
        return $this->informacoesConvite;
    }
     
    public function getMensagemPersonalizada()
    {
        return $this->mensagemPersonalizada;
    }   
   
}

?>