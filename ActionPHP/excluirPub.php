<?php

use App\Produto;

require_once '../vendor/autoload.php';

    if($_GET){
        $produto = new Produto();
        $idPub = $_GET['id'];
        $publicacao = $produto->getProdutoId($idPub);
        $idProduto = $publicacao[0]['idProduto'];
        $idAutor = $publicacao[0]['idAutor'];

        if($idPub == $idProduto || $_SESSION['idUsuario'] == $idAutor){
            $resultado = $produto->excluirProdutoId($idPub);
            if($resultado == true){
                header("Location: ../perfil.php?id=2");
            }
        }

    }
?>