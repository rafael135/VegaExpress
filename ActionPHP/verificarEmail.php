<?php
    require '../vendor/autoload.php';
    use App\Email;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
    try{
        //Configurações de servidor:
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "";
        $mail->Password = "";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Informações da mensagem:
        $mail->setFrom("", "");
        $mail->addAddress("{email do usuário}", "{nome do usuário}");
        $mail->addReplyTo("", "");
       
        //Outros:
        //$mail->addAttachment();

        //Conteúdo do email:
        $mail->isHTML(true);
        $mail->Subject = "";
        $mail->Body = "";
        $mail->AltBody = "";

        $mail->send();

    }catch(Exception $e){
        echo("Erro: " . $mail->ErrorInfo);
    }


    /*if(isset($_SESSION['idUsuario'])){
        $destino = $_SESSION['emailUsuario'];
        $titulo = "VegaExpress";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: VegaExpress <vegaexpress@org.com.br>";

        $enviarEmail = new Email($destino, $titulo, "Teste");

        var_dump($enviarEmail);
    }*/
?>