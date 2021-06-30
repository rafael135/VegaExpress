<?php

namespace App;

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(PHP_SESSION_NONE){
    session_start();
}


class Email
{
    private $mail;

    public function __construct()
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->isSMTP();
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->SMTPAuth = true;
            $this->mail->Username = "vegaexpress0@gmail.com";
            $this->mail->Password = "35418706";
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mail->Port = 587;
        } catch (Exception $e) {
        }
    }

    public function setDestino($destino, $nomeUsr)
    {
        $this->mail->setFrom("vegaexpress0@gmail.com", "VegaExpress");
        $this->mail->addAddress("$destino", "$nomeUsr");
        $this->mail->isHTML(true);
        $this->mail->CharSet = "utf-8";
    }

    public function setAssunto($assunto){
        $this->mail->Subject = $assunto;
    }

    public function setConteudoEmail($html){
        $this->mail->Body = $html;
    }

    public function setConteudoEmailAdaptativo($text){
        $this->mail->AltBody = $text;
    }

    public function enviarEmail(){
        $resultado = $this->mail->send();
        return $resultado;
    }
}
