<?php

namespace App;

require_once(__DIR__ . "/../../vendor/autoload.php");
class Pedido
{
    private $idItems;
    private $obDb;

    function __construct($idItems)
    {
        $this->idItems = $idItems;
        $this->obDb = new Database("pedidos");
    }

    function verificarUsr($id)
    {
        $sql = "SELECT * FROM " . $this->obDb->getTabela() . " WHERE idUsuario = :id";
        $sql = $this->obDb->getConexao()->prepare($sql);
        $sql->bindValue("id", $id);
        $sql->execute();
        
//var_dump($sql->rowCount());
        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }








    function registrarPedidos()
    {
        $pedidos = $this->idItems;
        $idUsuario = intval($_SESSION['idUsuario']);


        $result = true;
        $precoTotal = 0;

        foreach ($pedidos as $pedido) {
            $produto = new Produto();
            $produto = $produto->getProdutoId($pedido);
            $produto = $produto[0];
            $produtoTitulo = $produto['titulo'];
            $produtoPreco = floatval($produto['preco']);
            $produtoIdAutor = intval($produto['idAutor']);
            //$autor = new Autor();
            //$autor = $autor->getInformacoesAutor($produtoIdAutor);
            //$autor = $autor[0];









            $result = $this->obDb->inserir([
                'idProduto' => intval($pedido),
                'idUsuario' => $idUsuario,
                'tituloProduto' => $produtoTitulo,
                'precoProduto' => $produtoPreco
            ]);
        }

        if ($result != false) {
            return true;
        } else {
            return false;
        }
    }
}
