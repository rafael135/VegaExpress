<?php
    require '../vendor/autoload.php';
    use App\Email;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    $mail = new PHPMailer(true);
    try{
        //Configurações de servidor:
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "vegaexpress0@gmail.com";
        $mail->Password = "35418706";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //Informações da mensagem:
        $emailDestino = $_SESSION['emailUsuario'];
        $nomeDestino = $_SESSION['nomeUsuario'];

        
        
        $mail->setFrom("vegaexpress0@gmail.com", "VegaExpress");
        $mail->addAddress("$emailDestino", "$nomeDestino");
        //$mail->addReplyTo("", "");
       
        //Outros:
        //$mail->addAttachment();

        //Conteúdo do email:
        $mail->isHTML(true);
        $mail->Subject = "Confirmação de e-mail";
        $mail->Body = "<p style='text-align: center'>Clique no botão abaixo para confirmar o e-mail:</p>";
        $mail->AltBody = "Clique no botão abaixo para confirmar o e-mail:";

        if($mail->send()){
            echo("E-mail enviado com sucesso!");
        }

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