<?php

namespace dto;

abstract class PessoaDto{

    private $nome;
    private $telefone;
    private $email;
    private $funcao;
    private $senha;

    public function __construct($pessoa){        
        $this->nome = isset($pessoa['nome']) ? $pessoa['nome'] : '';        
        $this->telefone = isset($pessoa['telefone']) ? $pessoa['telefone'] : '';
        $this->email = isset($pessoa['email']) ? $pessoa['email'] : '';
        $this->funcao = isset($pessoa['funcao']) ? $pessoa['funcao'] : '';
        $this->senha = isset($pessoa['senha']) ? $pessoa['senha'] : '';
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

    public function ehNull($param){        
        if(empty($param)){
            return '';
        }
        return $param;
    }
}
