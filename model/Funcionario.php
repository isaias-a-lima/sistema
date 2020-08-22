<?php

namespace model;

require_once '../model/Pessoa.php';
use model\Pessoa;

class Funcionario extends Pessoa{
    
    private $id;
    private $statusFuncionario;

    public function __construct($dto){
        parent::__construct($dto);
        $this->id = $dto->getId();
        $this->statusFuncionario = $dto->getStatusFuncionario();
    }

    public function getId(){
        return $this->id;
    }

    public function getStatusFuncionario(){
        return $this->statusFuncionario;
    }
}
?>