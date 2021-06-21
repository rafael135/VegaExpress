<?php

use App\Produto;

require_once '../vendor/autoload.php';

session_start();

    if($_GET){
        $produto = new Produto();
        $idPub = $_GET['id'];
        $publicacao = $produto->getProdutoId($idPub);
        $idProduto = $publicacao[0]['idProduto'];
        $idAutor = $publicacao[0]['idAutor'];

        if($idPub == $idProduto || $_SESSION['idUsuario'] == $idAutor){
            $resultado = $produto->excluirProdutoId($idPub);
            if($resultado == true){
                $destino = "../UsrImg/" . $_SESSION['idUsuario'] . "/Produtos/" . $idPub;
                $files = scandir($destino);
                foreach($files as $file){
                    if(is_file($destino . "/$file")){
                        unlink($destino . "/$file");
                    }else{
                        rmdir($destino);
                    }
                }

                header("Location: ../perfil.php?id=2");
            }
        }

    }
?>