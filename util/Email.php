<?php

namespace util;

use controller\EmpresaController;

require_once '../controller/EmpresaController.php';

class Email{

    /**
     * Método para enviar um e-mail
     * 
     * @param $de - Remetente - Requerido
     * @param $para - Destinatário - Requerido
     * @param $cc - Com cópia - Opcional
     * @param $assunto - Assunto do e-mail - Requerido
     * @param $mensagem - Mensagem do e-mail - Requerido
     * @param $msgSucesso - Mensagem de retorno em caso de sucesso no envio - Opcional
     * @param $msgErro - Mensagem de retorno em caso de erro no envio - Opcional
     */

    public function enviarEmail($de, $para, $cc, $assunto, $mensagem, $msgSucesso, $msgErro){
        
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: <$de> \r\n";
        $headers .= strlen($cc) > 0 ? "CC: $cc" : $headers;
        $mensagem = "
        <html>
        <head>
        <title>$assunto</title>
        </head>
        <body>
        <h2>$assunto</h2>
        <div>
        $mensagem
        </div>
        </body>
        </html>
        ";

        if(empty($de)){
            return 'O campo "de" é obrigatório!';
        }
        if(empty($para)){
            return 'O campo "para" é obrigatório!';
        }
        if(empty($assunto)){
            return 'O campo "assunto" é obrigatório!';
        }
        if(empty($mensagem)){
            return 'O campo "mensagem" é obrigatório!';
        }

        if(mail($para, $assunto, $mensagem, $headers)){
            return $msgSucesso;
        }else{
            return $msgErro;
        }
    }

    public function emailCadastroIntegrante($para, $nome, $senha,$assinatura){
        $empresa = EmpresaController::exibirEmpresa();
        $urlSistema = $empresa->getUrlSistema();
        $de = 'contato@ikdesigns.com.br';
        $cc = '';
        $assunto = 'Cadastro de integrante da comissão';
        $msgSucesso = 'E-mail informativo enviado ao formando!';
        $msgErro = 'Não foi possível enviar o e-mail!';
        $mensagem = "
        <p>
        Olá $nome!        
        Você foi cadastrado(a) como integrante de uma comissão.
        </p>
        <p>
        <b>Dados de acesso ao sistema</b>
        <dl>
        <dt>Login</dt>
        <dd>Seu e-mail cadastrado</dd>
        <dt>Senha</dt>
        <dd>$senha</dd>
        <dt>Link de acesso ao sistema</dt>
        <dd><a href='$urlSistema'>link</a></dd>
        </dl>
        </p>
        <p>
        Atenciosamente,<br>
        $assinatura
        </p>
        ";
        $res = $this->enviarEmail($de, $para, $cc, $assunto, $mensagem, $msgSucesso, $msgErro);
        return $res;
    }    
} 

?>