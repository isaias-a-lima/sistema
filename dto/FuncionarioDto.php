<?php

namespace dto;

require_once '../dto/PessoaDto.php';
use dto\PessoaDto;

class FuncionarioDto extends PessoaDto{

    private $id;
    private $statusFuncionario;

    public function __construct($pessoa){        
        parent::__construct($pessoa);        
        $this->id = isset($pessoa['id']) ? $pessoa['id'] : '';
        $this->statusFuncionario = isset($pessoa['statusFuncionario']) ? $pessoa['statusFuncionario'] : '';
    }

    public function getId(){
        return $this->id;
    }

    public function getStatusFuncionario(){
        return $this->statusFuncionario;
    }    
}

?>