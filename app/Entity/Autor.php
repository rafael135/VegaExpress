<?php
    namespace App;
    require_once(__DIR__ . "/../../vendor/autoload.php");

    class Autor{
        private $id;

        public function __construct($id = null)
        {
            if($id != null){
                $this->id = $id;
            }
        }

        public function getInformacoesAutor($idAutor){
            $obDb = new Database('usuarios');

            $sql = "SELECT * FROM " . $obDb->getTabela() . " WHERE id = :idAutor";
                    $sql = $obDb->getConexao()->prepare($sql);
                    $sql->bindValue("idAutor", $idAutor);
                    $sql->execute();

                    if($sql->rowCount() > 0){
                        $dados = $sql->fetch();
                        return $dados;
                    }
        }
    }
?>