<?php

namespace util;

class Arquivo{

    public static function verifyFile($arquivo){
        
        if(empty($arquivo)){
            return 'Nenhum arquivo selecionado!';
        }

        $file = $arquivo['name'];        

        $diretorio = pathinfo($file,PATHINFO_DIRNAME);
        $nome = pathinfo($file,PATHINFO_BASENAME);
        $nome = strtolower($nome);       
        $nome = str_replace(' ','_',$nome);
        $tipo = strtolower(pathinfo($file,PATHINFO_EXTENSION));
        $tamanho = $arquivo['size'];
        

        if(strlen($nome) < 1){
            return 'O nome do arquivo "'. $nome .'" é inválido!';
        }

        if(
            $tipo != 'jpg' &&
            $tipo != 'jpeg' &&
            $tipo != 'png' && 
            $tipo != 'gif' && 
            $tipo != 'pdf' && 
            $tipo != 'rar' && 
            $tipo != 'zip' &&
            $tipo != 'doc' &&
            $tipo != 'docx' &&
            $tipo != 'xls' &&
            $tipo != 'xlsx' 
            ){
                return 'O tipo de arquivo "' . $tipo . '" não é permitido!';
            }
        
        if($tamanho < 1){
            return 'O tamanho do arquivo "' . $tamanho . '" é inválido!';
        }

        $verified = Array();
        $verified['diretorio'] = $diretorio;
        $verified['nome'] = $nome;
        $verified['tipo'] = $tipo;
        $verified['tamanho'] = $tamanho;
        $verified['tmp_name'] = $arquivo['tmp_name'];

        return $verified;
    }

    public static function enviarArquivo($fileName, $targetFile){
        return move_uploaded_file($fileName, $targetFile);
    }
}

?>