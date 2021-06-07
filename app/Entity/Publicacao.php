<?php
namespace App;
    require_once(__DIR__ . "/../../vendor/autoload.php");
    use App\Database;
    use PDO;
    use ErrorException;
    use Exception;
use PDOException;

class Publicacao{
    private $id;
    private $titulo;
    private $descricao;
    private $preco;
    private $categoria = "";

    public function __construct($id = null ,$titulo = null, $descricao = null, $preco = null)
    {   
        $this->id = $id;
        //$this->titulo = $titulo;
        //$this->descricao = $descricao;
        //$this->preco = $preco;
    }

    public function getId(){
        return $this->id;
    }

    public function registrarPublicacao($titulo, $descricao, $preco){
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->preco = $preco;

        $obDatabase = new Database('produtos');

        session_start();
            //Definir a data
            //$this -> data = date('Y-m-d H:i:s');
            try{
            $this -> id = $obDatabase -> inserir([
                'titulo' => $this->titulo,
                'idAutor' => $_SESSION['idUsuario'],
                'descricao' => $this->descricao,
                'preco' => $this->preco,
                'categoria' => $this->categoria
            ]);

            return $this -> id;
        }catch(ErrorException $e){
                die('Erro ao tentar cadastrar o usuário! ERRO: ' . $e->getMessage());
                
            }

    }

    public function inserirImagens($imagem = null){
        $obDatabase = new Database('produtos');

        //$imagem = json_encode($imagem);
        

        
        //session_start();
        $sql = $obDatabase->getConexao();
        $sth = $sql->prepare("SELECT imagens FROM produtos WHERE idProduto = $this->id");
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_BOTH);
        
        $colunaImagens = $result[0];
        
        
        //var_dump($colunaImagens);
        if($colunaImagens == ""){
            $colunaImagens = "";
        }else{
            $colunaImagens .= " ";
        }

        $query = "UPDATE produtos SET imagens = '$colunaImagens" . "$imagem' WHERE idProduto = '$this->id'";
        $sql = $obDatabase->getConexao();
        $result = $sql->prepare($query);
        try{
        $resultado = $result->execute();
        }catch(PDOException $e){
            echo("Erro: " . $e->getMessage());
        }
        return $resultado;
    }

    public function editarPublicacao($id, $titulo, $preco, $descricao){
        $obDatabase = new Database('produtos');
        $result = $obDatabase->atualizar("idProduto = $id", [
            'titulo' => $titulo,
            'preco' => $preco,
            'descricao' => $descricao
        ]);
        return $result;
    }

    
}
