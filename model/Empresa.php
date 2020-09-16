<?php

namespace model;

class Empresa
{
    private $nome;
    private $telefone;
    private $emailContato;
    private $emailFinanceiro;
    private $endereco;
    private $cnpj;
    private $urlSistema;
    private $linksDir;
    private $filesDir;

    public function __construct()
    {
        $pathFile = '../config/empresaNome.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->nome = fread($file, filesize($pathFile));
            fclose($file);
        }


        $pathFile = '../config/empresaTelefone.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->telefone = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaEmailContato.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->emailContato = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaEmailFinanceiro.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->emailFinanceiro = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaEndereco.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->endereco = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaCnpj.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->cnpj = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaUrlSistema.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->urlSistema = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaLinksDir.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->linksDir = fread($file, filesize($pathFile));
            fclose($file);
        }

        $pathFile = '../config/empresaFilesDir.txt';
        if (filesize($pathFile) > 0) {
            $file = fopen($pathFile, 'r');
            $this->filesDir = fread($file, filesize($pathFile));
            fclose($file);
        }
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEmailContato()
    {
        return $this->emailContato;
    }

    public function getEmailFinanceiro()
    {
        return $this->emailFinanceiro;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getUrlSistema()
    {
        return $this->urlSistema;
    }

    public function getLinksDir()
    {
        return $this->linksDir;
    }

    public function getFilesDir()
    {
        return $this->filesDir;
    }

    public function setNome($nome)
    {
        $file = fopen('../config/empresaNome.txt', 'w');
        $res = fwrite($file, $nome);
        fclose($file);
        if (is_numeric($res)) {
            $this->nome = $nome;
            return 1;
        } else {
            return 'Não foi possível alterar o nome!';
        }
    }

    public function setTelefone($telefone){
        $file = fopen('../config/empresaTelefone.txt', 'w');
        $res = fwrite($file, $telefone);
        fclose($file);
        if (is_numeric($res)) {
            $this->telefone = $telefone;
            return 1;
        } else {
            return 'Não foi possível alterar o telefone!';
        }
    }

    public function setEmailContato($emailContato){
        $file = fopen('../config/empresaEmailContato.txt', 'w');
        $res = fwrite($file, $emailContato);
        fclose($file);
        if (is_numeric($res)) {
            $this->emailContato = $emailContato;
            return 1;
        } else {
            return 'Não foi possível alterar o e-mail de contato!';
        }
    }

    public function setEmailFinanceiro($emailFinanceiro){
        $file = fopen('../config/empresaEmailFinanceiro.txt', 'w');
        $res = fwrite($file, $emailFinanceiro);
        fclose($file);
        if (is_numeric($res)) {
            $this->emailFinanceiro = $emailFinanceiro;
            return 1;
        } else {
            return 'Não foi possível alterar o e-mail do financeiro!';
        }
    }

    public function setEndereco($endereco){
        $file = fopen('../config/empresaEndereco.txt', 'w');
        $res = fwrite($file, $endereco);
        fclose($file);
        if (is_numeric($res)) {
            $this->endereco = $endereco;
            return 1;
        } else {
            return 'Não foi possível alterar o endereço!';
        }
    }

    public function setCnpj($cnpj){
        $file = fopen('../config/empresaCnpj.txt', 'w');
        $res = fwrite($file, $cnpj);
        fclose($file);
        if (is_numeric($res)) {
            $this->cnpj = $cnpj;
            return 1;
        } else {
            return 'Não foi possível alterar o cnpj!';
        }
    }

    public function setUrlSistema($urlSistema)
    {
        $file = fopen('../config/empresaUrlSistema.txt', 'w');
        $res = fwrite($file, $urlSistema);
        fclose($file);
        if (is_numeric($res)) {
            $this->urlSistema = $urlSistema;
            return 1;
        } else {
            return 'Não foi possível alterar o url do sistema!';
        }
    }

    public function setLinksDir($linksDir)
    {
        $file = fopen('../config/empresaLinksDir.txt', 'w');
        $res = fwrite($file, $linksDir);
        fclose($file);
        if (is_numeric($res)) {
            $this->linksDir = $linksDir;
            return 1;
        } else {
            return 'Não foi possível alterar o diretorio de links!';
        }
    }

    public function setFilesDir($filesDir)
    {
        $file = fopen('../config/empresaFilesDir.txt', 'w');
        $res = fwrite($file, $filesDir);
        fclose($file);
        if (is_numeric($res)) {
            $this->filesDir = $filesDir;
            return 1;
        } else {
            return 'Não foi possível alterar o diretorio de arquivos!';
        }
    }
}
