<?php
    require_once '../vendor/autoload.php';

    if($_POST){
        $pesquisarTxt = $_POST['txtPesquisa'];
        $frete;
        if(isset($_POST['checkFrete'])){
            $frete = true;
        }else{
            $frete = false;
        }
        $condicaoProduto = $_POST['radioCondicao'];

        $filtro = 0;
        if(isset($_POST['selectFiltrar'])){
            $filtro = $_POST['selectFiltrar'];
        }

        $filtroPreco = 0;
        if(isset($_POST['selectFiltrarPreco'])){
            $filtroPreco = $_POST['selectFiltrarPreco'];
        }

        header("Location: ../pesquisa.php?txtPesquisa=$pesquisarTxt&frete=$frete&condicaoProduto=$condicaoProduto&filtro=$filtro&filtroPreco=$filtroPreco");
    }
?>