<?php

namespace model;

abstract class Pessoa{

    private $nome;
    private $telefone;
    private $email;
    private $funcao;
    private $senha;

    public function __construct($pessoaDto){        
        $this->nome = $pessoaDto->getNome();
        $this->telefone = $pessoaDto->getTelefone();
        $this->email = $pessoaDto->getEmail();
        $this->funcao = $pessoaDto->getFuncao();
        $this->senha = $pessoaDto->getSenha();
    }

    public function getNome(){
        return $this->nome;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFuncao(){
        return $this->funcao;
    }

    public function getSenha(){
        return $this->senha;
    }    
}
?>