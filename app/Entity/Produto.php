<?php

namespace App;

require_once(__DIR__ . "/../../vendor/autoload.php");


use App\Database;

class Produto
{
    private $id;

    public function __construct($id = null)
    {
        if ($id == null) {
        } else {
            $this->id = $id;
        }
    }

    public function getTodosProdutos()
    {
        

        $obDb = new Database("produtos");


        $sql = "SELECT * FROM " . $obDb->getTabela();
        $sql = $obDb->getConexao()->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function getProdutoId($id){
        $obDb = new Database("produtos");


        $sql = "SELECT * FROM " . $obDb->getTabela() . " WHERE idProduto = " . $id;
        $sql = $obDb->getConexao()->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function getProdutoAutorId($id)
    {
        $obDb = new Database("produtos");


        $sql = "SELECT * FROM " . $obDb->getTabela() . " WHERE idAutor = " . $id;
        $sql = $obDb->getConexao()->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function excluirProdutoId($id){
        $obDb = new Database("produtos");

        $sql = "DELETE FROM produtos WHERE idProduto = $id";
        $sql = $obDb->getConexao()->prepare($sql);
        $sql->execute();
        
        return true;
    }
}
