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


    public function registrarVenda($id, $val){
        $obDb = new Database("produtos");
            $resultado = $obDb->atualizar("idProduto = $id", [
                'vendas' => $val
            ]);
            return $resultado;
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

    public function getProdutoId($id)
    {
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

    public function excluirProdutoId($id)
    {
        $obDb = new Database("produtos");

        $sql = "DELETE FROM produtos WHERE idProduto = $id";
        $sql = $obDb->getConexao()->prepare($sql);
        $sql->execute();

        return true;
    }

    public function getProdutos($pesquisa = null, $frete = null, $condicao = null, $precoMin = null, $precoMax = null, $filtro = null, $filtroPreco = null, $pagina = null)
    {
        $obDb = new Database("produtos");


        $cont = 0;

        if ($filtro == 3) {
            $filtro = "avaliacao DESC";
            $cont++;
        } elseif ($filtro == 4) {
            $filtro = "dataPublicacao DESC";
            $cont++;
        } elseif ($filtro == 5) {
            $filtro = "dataPublicacao ASC";
            $cont++;
        } else {
            $filtro = null;
        }

        if ($filtroPreco == 1) {
            $filtroPreco = "preco DESC";
            $cont++;
        } elseif ($filtroPreco == 2) {
            $filtroPreco = "preco ASC";
            $cont++;
        } else {
            $filtroPreco = null;
        }



        $filtroDefinitivo = "";

        if ($filtro != null) {
            $filtroDefinitivo .= $filtro;
        }
        if ($filtroPreco != null) {
            if (count_chars($filtroDefinitivo) > 0) {
                $filtroDefinitivo .= "_" . $filtroPreco;
            }else{
                $filtroDefinitivo .= $filtroPreco;
            }
           
        }

        if (str_contains($filtroDefinitivo, "_")) {
            $filtroDefinitivo = explode("_", $filtroDefinitivo);
        }

        if ($filtroDefinitivo == "") {
            $filtroDefinitivo = null;
        }

        $wherePreco = "";

        if($precoMin != "" && $precoMax != ""){
            $wherePreco .= "preco BETWEEN $precoMin AND $precoMax OR";
        }elseif($precoMin != ""){
            $wherePreco .= "preco > $precoMin OR";
        }elseif($precoMax != ""){
            $wherePreco .= "preco < $precoMax OR";
        }

        //var_dump("$wherePreco titulo like '%$pesquisa%' OR descricao like '%$pesquisa%' AND frete = $frete AND condicao = $condicao");
        $paginaAnt = 0;
        $proxPag = 0;
        $limit = "";
        
        if($pagina != null){
            $paginaAnt = (($pagina * 10) - 10);
            if($paginaAnt <= 0){
                $paginaAnt = 0;
            }
            $proxPag = ($proxPag) + 10;

            $limit = "$paginaAnt, $proxPag";
            //var_dump($limit);
        }

        


        $result = $obDb->select("$wherePreco titulo like '%$pesquisa%' OR descricao like '%$pesquisa%' AND frete = $frete AND condicao = $condicao", $filtroDefinitivo, $limit);
        $quantidade = 0;
        if($result == false){
            $quantidade = 0;
        }else{
            $quantidade = count($obDb->select("$wherePreco titulo like '%$pesquisa%' OR descricao like '%$pesquisa%' AND frete = $frete AND condicao = $condicao", $filtroDefinitivo));
        }
        
        $_SESSION['quantidadeProdutosPesquisa'] = $quantidade;
        return $result;
    }
}
