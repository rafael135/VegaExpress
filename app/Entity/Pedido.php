<?php

namespace App;

use ErrorException;

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

    function verificarUsr($idUsr, $idPub)
    {
        $sql = "SELECT * FROM " . $this->obDb->getTabela() . " WHERE idUsuario = :idUsr";
        $sql = $this->obDb->getConexao()->prepare($sql);
        $sql->bindValue("idUsr", $idUsr);
        $sql->execute();
        $resultado = $sql->fetchAll();
        foreach ($resultado as $pedido) {
            if ($pedido['idProduto'] == $idPub) {
                return true;
            }
        }

        //var_dump($sql->rowCount());
        if ($sql->rowCount() > 0) {
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
            $autor = new Autor();
            $dadosAutor = $autor->getInformacoesAutor($produtoIdAutor);
            $autorTotalVendas = intval($dadosAutor['totalVendas']);
            $autorTotalVendas++;
            $userAutor = new Usuario();
            $userAutor->registarVenda($produtoIdAutor, $autorTotalVendas);






            $produto = new Produto();

            $dadosProd = $produto->getProdutoId($pedido);
            $quantidadeVendas = intval($dadosProd[0]['vendas']);
            $quantidadeVendas++;
            $produto->registrarVenda($pedido, $quantidadeVendas);

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

    function getPedidoUsrId($id)
    {
        $where = "idUsuario = $id";
        $field = '*';
        try {
            $solicitacao = $this->obDb->select($where, null, null, $field);

            return $solicitacao;
        } catch (ErrorException $e) {
            die('Erro ao tentar cadastrar o usuário! ERRO: ' . $e->getMessage());
        }
    }
}

?>