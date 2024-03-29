<?php
    require '../vendor/autoload.php';
    use App\Email;
    use PHPMailer\PHPMailer\Exception;
    session_start();

    if(isset($_SESSION['idUsuario'])){
    $mail = new Email();
    try{
        $emailDestino = $_POST['email']; //$_SESSION['emailUsuario'];
        $nomeDestino = $_SESSION['nomeUsuario'];
        $mail->setDestino($emailDestino, $nomeDestino);
        

        $codConfirmacao = rand(0, 999999999999);
        $_SESSION['codVerificacao'] = $codConfirmacao;

        //Conteúdo do email:
        $mail->setAssunto("Confirmação de e-mail");

        $html = "</head>
        <p style='font-size: 2rem;'>Clique no botão abaixo para confirmar o e-mail:</p>
        <div style='display: inline-block; text-align: center;'>
        <a href='localhost/VegaExpress/perfil.php?confirm=$codConfirmacao'><button style='display: inline-block;
        font-weight: 500;
        line-height: 1.5;
        color: #212529;
        text-align: center !important;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: #027CE9;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1.5rem;
        border-radius: .25rem;
        color: #fff;
        transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;'>Confirmar e-mail</button></a></div>";

        $mail->setConteudoEmail($html);
        
        $txt = "Clique no link abaixo para confirmar o e-mail:\n
        localhost/VegaExpress/perfil.php?confirm=$codConfirmacao";

        $mail->setConteudoEmailAdaptativo($txt);

        $resultado = $mail->enviarEmail();
        
        if($resultado != false){
            $_SESSION['emailEnviado'] = true;
            header("Location: ../perfil.php?id=1");
        }else{
            $_SESSION['emailEnviado'] = false;
            header("Location: ../perfil.php?id=1");
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
}
?>