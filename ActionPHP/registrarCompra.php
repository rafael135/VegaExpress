<?php

use App\Pedido;

require_once '../vendor/autoload.php';
session_start();

    if($_POST){
        $items = $_SESSION['conteudoCarrinho'];
        $cidade = $_POST['Cidade'];
        $estado = $_POST['Estado'];
        $endereco = $_POST['Endereco'];
        $cep = $_POST['Cep'];
        $numero = $_POST['Numero'];



        $registrar = new Pedido($items);
        $registrar = $registrar->registrarPedidos($estado, $cidade, $endereco, $cep, $numero);
        if($registrar != false){
            unset($_SESSION['conteudoCarrinho']);
        }
    }
?>