<?php

    namespace App;
    require '../vendor/autoload.php';
    use PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\PHPMailer as PHPMailerPHPMailer;

class Email{
        private $destino;
        private $assunto;
        private $mensagem;
        private $mail = new PHPMailerPHPMailer();


        public function __construct($destino, $assunto, $mensagem)
        {
            $this->destino = $destino;
            $this->assunto = $assunto;
            $this->mensagem = $mensagem;
        }

        public function enviarEmail(){
            
            $this->mail->isSMTP();
            $this->mail->Host = "vegaexpressmail.com";
            $this->mail->Port = 25;
            $this->mail->SMTPAuth = true;

            $this->mail->Username = "";
            $this->mail->Password = "";

            // Configurações de compatibilidade para autenticação em TLS 
            $this->mail->SMTPOptions = array("ssl" => array("verify_peer" => false, "verify_peer_name" => false, "allow_self_signed" => true));
            //Assim pode identificar mensagens de erro. 
            // $this->mail->SMTPDebug = 2; 

            $this->mail->FromName = "VegaExpress";

            // Define o(s) destinatário(s) 
            $this->mail->AddAddress($this->destino, "Teste");
            
            // Definir se o e-mail é em formato HTML ou texto plano 
            // Formato HTML . Use "false" para enviar em formato texto simples ou "true" para HTML.
            $this->mail->IsHTML(true); 

            // Define o Charset
            $this->mail->CharSet = "UTF-8";

            // Assunto da mensagem
            $this->mail->Subject = "Verificação de conta";

            // Corpo do email
            $this->mail->Body = "Conteúdo do email";

            // Opcional: Anexos
            //$this->mail->addAttachment("/home/exemplo/arquivo.pdf", "arquivo.pdf");

            // Envia o email
            $enviado = $this->mail->send();

            //Exibe a mensagem para o usuário
            if($enviado){
                // Retorna verdadeiro se o email for enviado com sucesso
                return true;
            }else{
                return false;
            }
        }
    }
?>