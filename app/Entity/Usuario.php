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

        function __construct($id = null, $nome = null, $email = null, $senha = null, $endereco = null, $celular = null)
        {
            $this->id = $id;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
            $this->endereco = $endereco;
            $this->celular = $celular;
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
                'celular' => $this->celular
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
                        $_SESSION['verificadoUsuario'] = $dado['contaVerificada'];
                        $_SESSION['enderecoUsuario'] = $dado['endereco'];
                        $_SESSION['usuarioVerificado'] = $dado['contaVerificada'];
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
                        $_SESSION['verificadoUsuario'] = $dado['contaVerificada'];
                        $_SESSION['enderecoUsuario'] = $dado['endereco'];
                        $_SESSION['usuarioVerificado'] = $dado['contaVerificada'];
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
                    $_SESSION['verificadoUsuario'] = $dado['contaVerificada'];
                    $_SESSION['enderecoUsuario'] = $dado['endereco'];
                }
            }
        }
    }
?>