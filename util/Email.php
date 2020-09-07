<?php

namespace util;

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
        <p>
        $mensagem
        </p>
        </body>
        </html>
        ";

        if(empty($de)){
            return '<div class="alert alert-danger">O campo \"de\" é obrigatório!</div>';
        }
        if(empty($para)){
            return '<div class="alert alert-danger">O campo \"para\" é obrigatório!</div>';
        }
        if(empty($assunto)){
            return '<div class="alert alert-danger">O campo \"assunto\" é obrigatório!</div>';
        }
        if(empty($mensagem)){
            return '<div class="alert alert-danger">O campo \"mensagem\" é obrigatório!</div>';
        }

        if(mail($para, $assunto, $mensagem, $headers)){
            return '<div class="alert alert-danger">' . $msgSucesso . '</div>';
        }else{
            return '<div class="alert alert-danger">' . $msgErro . '</div>';
        }
    }

    public function emailCadastroIntegrante($para, $nome, $senha,$assinatura){
        $de = 'contato@ikdesigns.com.br';
        $cc = '';
        $assunto = 'Cadastro de integrante da comissão';
        $msgSucesso = 'E-mail informativo enviado com sucesso!';
        $msgErro = 'Não foi possível enviar o e-mail!';
        $mensagem = "
        Olá $nome!
        <br>
        <br>
        Você foi cadastrado(a) como integrante de uma comissão.
        <br>
        <br>
        Utilize seu e-mail e a senha '$senha' para acessar o sistema.
        <br>
        <br>
        Atenciosamente,<br>
        $assinatura
        ";
        $res = $this->enviarEmail($de, $para, $cc, $assunto, $mensagem, $msgSucesso, $msgErro);
        return $res;
    }    
} 

?>