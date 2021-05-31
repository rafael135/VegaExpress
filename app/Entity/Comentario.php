<?php
namespace App;

require_once(__DIR__ . "/../../vendor/autoload.php");

class Comentario{
    private $id;
    private $idAutor;
    private $idProduto;
    private $txt;
    private $dataPub;

    public function __construct()
    {
        
    }

    public function getPubComentarios($idProduto){
        $obDataBase = new Database("comentarios");

        $sql = "SELECT * FROM " . $obDataBase->getTabela() . " WHERE id = $idProduto";
        $sql = $obDataBase->getConexao()->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }

    public function novoComentario(){
        
    }
}
?>