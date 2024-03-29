<?php
    namespace App;
    require_once __DIR__ . '/../../vendor/autoload.php';
    

    use App\Database;
    use PDO;
    use ErrorException;

class Usuario{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $endereco;
        private $data;
        private $celular;
        private $cep;

        function __construct($id = null, $nome = null, $email = null, $senha = null, $endereco = null, $celular = null, $cep = null)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->endereco = $endereco;
            $this->celular = $celular;
            $this->cep = $cep;
        }

        // Responsável por cadastrar o usuário
        public function cadastrar(){
            $obDatabase = new Database('usuarios');

            //Definir a data
            //$this -> data = date('Y-m-d H:i:s');
            try{
            $this -> id = $obDatabase -> inserir([
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha,
                'endereco' => $this->endereco,
                'celular' => $this->celular,
                'cep' => $this->cep
            ]);

            return $this -> id;
        }catch(ErrorException $e){
                die('Erro ao tentar cadastrar o usuário! ERRO: ' . $e->getMessage());
                
            }
        }

        // Responsável por consultar o banco de dados e retornar os dados solicitados
        public function getDados($where = "", $field = '*'){
            // Em desenvolvimento
            $obDatabase = new Database('usuarios');

            try{
                $solicitacao = $obDatabase -> select($where, null, null, $field);
    
                return $solicitacao;
            }catch(ErrorException $e){
                    die('Erro ao tentar cadastrar o usuário! ERRO: ' . $e->getMessage());
                    
                }
        }

        public function login($emailCelular, $senha, $select = "*", $registro = false){
            $obDb = new Database("usuarios");

            if($registro == false){
                if(!str_contains($emailCelular, '@')){
                    $sql = "SELECT " . $select . " FROM " . $obDb->getTabela() . " WHERE celular = :celular AND senha = :senha";
                    $sql = $obDb->getConexao()->prepare($sql);
                    $sql->bindValue("celular", $emailCelular);
                    $sql->bindValue("senha", $senha);
                    $sql->execute();

                    if($sql->rowCount() > 0){
                        $dado = $sql->fetch();

                        session_start();
                        $_SESSION['idUsuario'] = $dado['id'];
                        $_SESSION['nomeUsuario'] = $dado['nome'];
                        $_SESSION['emailUsuario'] = $dado['email'];
                        $_SESSION['celularUsuario'] = $dado['celular'];
                        $_SESSION['enderecoUsuario'] = $dado['endereco'];
                        $_SESSION['usuarioVerificado'] = $dado['contaVerificada'];
                        $_SESSION['cepUsuario'] = $dado['cep'];
                    }

                }else{
                    $sql = "SELECT " . $select . " FROM " . $obDb->getTabela() . " WHERE email = :email AND senha = :senha";
                    $sql = $obDb->getConexao()->prepare($sql);
                    $sql->bindValue("email", $emailCelular);
                    $sql->bindValue("senha", $senha);
                    $sql->execute();

                    if($sql->rowCount() > 0){
                        $dado = $sql->fetch();

                        session_start();
                        $_SESSION['idUsuario'] = $dado['id'];
                        $_SESSION['nomeUsuario'] = $dado['nome'];
                        $_SESSION['emailUsuario'] = $dado['email'];
                        $_SESSION['celularUsuario'] = $dado['celular'];
                        $_SESSION['enderecoUsuario'] = $dado['endereco'];
                        $_SESSION['usuarioVerificado'] = $dado['contaVerificada'];
                        $_SESSION['cepUsuario'] = $dado['cep'];
                    }
                }
            }else{
                $sql = "SELECT " . $select . " FROM " . $obDb->getTabela() . " WHERE email = :email AND senha = :senha";
                $sql = $obDb->getConexao()->prepare($sql);
                $sql->bindValue("email", $emailCelular);
                $sql->bindValue("senha", $senha);
                $sql->execute();

                if($sql->rowCount() > 0){
                    $dado = $sql->fetch();

                    session_start();
                    $_SESSION['idUsuario'] = $dado['id'];
                    $_SESSION['nomeUsuario'] = $dado['nome'];
                    $_SESSION['emailUsuario'] = $dado['email'];
                    $_SESSION['celularUsuario'] = $dado['celular'];
                    $_SESSION['usuarioVerificado'] = $dado['contaVerificada'];
                    $_SESSION['enderecoUsuario'] = $dado['endereco'];
                    $_SESSION['cepUsuario'] = $dado['cep'];
                }
            }
        }

        public function mudarFotoPerfil($id, $foto){
            $obDb = new Database("usuarios");
            $resultado = $obDb->atualizar("id = $id", [
                'imgPerfil' => $foto
            ]);
            return $resultado;
        }   

        public function getFotoPerfil($id){
            $img = $this->getDados("id = $id", "imgPerfil");
            return $img;
        }

        public function mudarNome($id , $nome){
            $obDb = new Database("usuarios");
            $resultado = $obDb->atualizar("id = $id", [
                'nome' => $nome
            ]);
            return $resultado;
        }

        public function mudarSenha($id, $senha){
            $obDb = new Database("usuarios");
            $resultado = $obDb->atualizar("id = $id", [
                'senha' => $senha
            ]);
            return $resultado;
        }

        public function registarVenda($id ,$val){
            $obDb = new Database("usuarios");
            $resultado = $obDb->atualizar("id = $id", [
                'totalVendas' => $val
            ]);
            return $resultado;
        }

        public function registrarAvaliacao($id, $val){
            $obDb = new Database("usuarios");
            $resultado = $obDb->atualizar("id = $id", [
                'notaVendedor' => $val
            ]);
            return $resultado;
        }

        
    }
?>