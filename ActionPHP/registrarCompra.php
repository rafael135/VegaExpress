<?php

use App\Pedido;

require_once '../vendor/autoload.php';
session_start();

    if($_POST){
        $items = $_SESSION['conteudoCarrinho'];

        $registrar = new Pedido($items);
        $registrar = $registrar->registrarPedidos();
        if($registrar != false){
            unset($_SESSION['conteudoCarrinho']);
        }
    }
?>