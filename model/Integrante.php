<?php

namespace model;

require_once '../model/Pessoa.php';
use model\Pessoa;

class Integrante extends Pessoa{

    private $id;
    private $idComissao;
    private $informacoesConvite;
    private $mensagemPersonalizada;    

    public function __construct($dto){
        parent::__construct($dto);
        $this->id = $dto->getId();
        $this->idComissao = $dto->getIdComissao();
        $this->informacoesConvite = $dto->getInformacoesConvite();
        $this->mensagemPersonalizada = $dto->getMensagemPersonalizada();
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