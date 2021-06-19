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

        $precoMin = $_POST['precoMin'];
        $precoMax = $_POST['precoMax'];

        if($precoMin == ""){
            $precoMin = 0;
        }
        if($precoMax == ""){
            $precoMax = 0;
        }

        $filtroPreco = 0;
        if(isset($_POST['selectFiltrarPreco'])){
            $filtroPreco = $_POST['selectFiltrarPreco'];
        }

        $paginaAtual = 0;
        if(isset($_POST['paginaAtual'])){
            $paginaAtual = intval($_POST['paginaAtual']);
            if($paginaAtual == 1){
                $paginaAtual = 0;
            }
        }



        header("Location: ../pesquisa.php?txtPesquisa=$pesquisarTxt&frete=$frete&condicaoProduto=$condicaoProduto&filtro=$filtro&filtroPreco=$filtroPreco&precoMin=$precoMin&precoMax=$precoMax&paginaAtual=$paginaAtual");
    }
?>