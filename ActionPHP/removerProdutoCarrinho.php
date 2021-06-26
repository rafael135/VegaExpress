<?php
    require_once '../vendor/autoload.php';

    session_start();

    if(isset($_SESSION['idUsuario'])){
        if($_GET){
            $idPubRemove = intval($_GET['idPub']);
            $conteudoCarrinho = $_SESSION['conteudoCarrinho'];
            $pesquisa = array_search($idPubRemove, $conteudoCarrinho);
            $remover = array($idPubRemove);
            $conteudoCarrinho = array_diff($conteudoCarrinho, $remover);
            if(empty($conteudoCarrinho)){
                unset($_SESSION['conteudoCarrinho']);
                header("Location: ../carrinho.php");
            }else{
                $_SESSION['conteudoCarrinho'] = $conteudoCarrinho;
                header("Location: ../carrinho.php");
            }

            
        }
    }
?>