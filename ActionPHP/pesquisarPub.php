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
        var_dump($frete);
        var_dump($condicaoProduto);
    }
?>