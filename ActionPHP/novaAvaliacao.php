<?php

use App\Avaliacao;

require_once '../vendor/autoload.php';
    session_start();

    if($_POST){
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $avalia = intval($_POST['avaliacaoRadio']);

        $idUsr = $_SESSION['idUsuario'];
        $idPub = intval($_POST['idPub']);

        $avaliacao = new Avaliacao();

        $avaliacao->novaAvaliacao($idPub, $idUsr, $titulo, $texto, $avalia);
    }else{
        header("Location: ../index.php");
    }
?>