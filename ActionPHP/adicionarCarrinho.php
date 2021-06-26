<?php
require_once '../vendor/autoload.php';

session_start();

if (isset($_SESSION['idUsuario'])) {
    if ($_GET) {
        $idPubAdd = intval($_GET['idPub']);

        if (!isset($_SESSION['conteudoCarrinho'])) {
            $_SESSION['conteudoCarrinho'] = array(
                $idPubAdd
            );
            header("Location: ../produto.php?id=$idPubAdd");
        } else {
            $sessaoArray = $_SESSION['conteudoCarrinho'];
            $sessaoJuntar = array(
                $idPubAdd
            );

            $resultadoPesquisa = array_search($idPubAdd, $_SESSION['conteudoCarrinho'], false);


            $sessaoArray = array_merge($sessaoArray, $sessaoJuntar);
            $sessaoArray = array_unique($sessaoArray);
            $_SESSION['conteudoCarrinho'] = $sessaoArray;
            header("Location: ../produto.php?id=$idPubAdd");
        }

        //unset($_SESSION['conteudoCarrinho']);

    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
?>