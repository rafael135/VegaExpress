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

        $_COOKIE['freteGratis'] = $frete;
        $_COOKIE['condicaoProduto'] = $condicaoProduto;

        header("Location: ../pesquisa.php?pesquisar=$pesquisarTxt");
    }
?>