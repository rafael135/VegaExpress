<?php
    require_once '../vendor/autoload.php';

    if($_POST){
        $pesquisarTxt = $_POST['txtPesquisa'];
        $frete = $_POST['checkFrete'];
        $condicaoProduto = $_POST['radioCondicao'];
        var_dump($frete);
        var_dump($condicaoProduto);
    }
?>