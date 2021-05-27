<?php
    require '../vendor/autoload.php';
    use App\Email;
    

    if(isset($_SESSION['idUsuario'])){
        $destino = $_SESSION['emailUsuario'];
        $titulo = "VegaExpress";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: VegaExpress <vegaexpress@org.com.br>";

        $enviarEmail = new Email($destino, $titulo, "Teste");

        var_dump($enviarEmail);
    }
?>