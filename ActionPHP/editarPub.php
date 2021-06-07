<?php

use App\Produto;
use App\Publicacao;

require_once '../vendor/autoload.php';
session_start();


if ($_GET) {
    $produto = new Produto();
    $idPub = $_GET['id'];
    $publicacao = $produto->getProdutoId($idPub);
    $idProduto = $publicacao[0]['idProduto'];
    $idAutor = $publicacao[0]['idAutor'];
    $idUsuarioAtual = $_SESSION['idUsuario'];

    if ($idPub == $idProduto && $idUsuarioAtual == $idAutor) {
        if($_POST){
            $editarTitulo = $_POST['titulo'];
            $editarPreco = $_POST['preco'];
            $precoAnterior = $_POST['precoAnterior'];
            $editarPreco = str_replace(".", "", $editarPreco);
            if($editarPreco == ""){
                $precoAnterior = str_replace("R$", "", $precoAnterior);
                $precoAnterior = str_replace(",", ".", $precoAnterior);
                $editarPreco = $precoAnterior;
            }
            $editarDescricao = $_POST['descricao'];
            $editarPreco = str_replace(",", ".", $editarPreco);
            $publicacaoRS = new Publicacao();
            $resultado = $publicacaoRS->editarPublicacao($idProduto, $editarTitulo, $editarPreco, $editarDescricao);
            $_SESSION['succ'] = true;
            header("Location: ../editarPub.php?id=$idProduto");
        }
    } else {
        header("Location: ../perfil.php?id=2");
    }
} else {
    header("Location: ../perfil.php?id=2");
}



?>
