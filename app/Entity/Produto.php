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

    public function getProdutos($pesquisa = null, $frete = null, $condicao = null, $filtro = null){
        $obDb = new Database("produtos");
        if($filtro == 1){
            $filtro = "preco DESC";
        }elseif($filtro == 2){
            $filtro = "preco ASC";
        }elseif($filtro == 3){
            $filtro = "avaliacao DESC";
        }elseif($filtro == 4){
            $filtro = "dataPublicacao DESC";
        }elseif($filtro == 5){
            $filtro = "dataPublicacao ASC";
        }else{
            $filtro = null;
        }

        

        $result = $obDb->select("titulo like '%$pesquisa%' OR descricao like '%$pesquisa%' AND frete = $frete AND condicao = $condicao", $filtro);

        return $result;
    }
}
