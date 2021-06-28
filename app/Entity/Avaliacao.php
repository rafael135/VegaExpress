<?php 

namespace App;
    require_once __DIR__ . '/../../vendor/autoload.php';
    

    use App\Database;
    use PDO;
    use ErrorException;
use Exception;

class Avaliacao{

    private $id;

    public function __construct()
    {
        
    }

    public function novaAvaliacao($idPub, $idUsr, $titulo, $texto, $avaliacao){
        if($avaliacao < 0 || $avaliacao > 5){
            return false;
        }




        $obDb = new Database("comentarios");
        try{
        $this->id = $obDb->inserir([
            'idAutor' => $idUsr,
            'idProduto' => $idPub,
            'titulo' => $titulo,
            'txtComentario' => $texto,
            'avaliacao' => $avaliacao
        ]);
        $pub = new Produto();
        $dadosPub = $pub->getProdutoId($idPub);
        $idAutorPub = $dadosPub[0]['idAutor'];
        $autor = new Usuario();
        $dadosAutor = $autor->getDados("id = $idAutorPub");
        $avaliacaoAutor = intval($dadosAutor[0]['notaVendedor']);
        $avaliacaoAutor += $avaliacao;
        $autor->registrarAvaliacao($idAutorPub, $avaliacaoAutor);


        if($this->id != null){
            return true;
        }
        }catch(Exception $e){
            return false;
        }


    }


    public function getPubComentarios($idProduto){
        $obDataBase = new Database("comentarios");

        $sql = "SELECT * FROM " . $obDataBase->getTabela() . " WHERE idProduto = $idProduto";
        $sql = $obDataBase->getConexao()->prepare($sql);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
            return $dados;
        } else {
            return false;
        }
    }
}
