<?php

namespace App;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use PDOException;

class Database
{
    // Host do BD
    const HOST = "localhost";

    // Nome do BD
    const NOME = "vegaexpress";

    // Usuário do BD
    const USUARIO = "root";

    // Senha do BD
    const SENHA = "";

    // Nome da tabela a ser manipulada
    private $tabela;

    // Instancia de conexão com BD
    private $conexao;

    // Instancia a tabela e conexão
    public function __construct($tabela = null)
    {
        $this->tabela = $tabela;
        $this->setarConexao();
    }

    //Responsável por criar uma conexão com o BD
    private function setarConexao()
    {
        try {
            $this->conexao = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::NOME, self::USUARIO);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }

    // Responsável por executar querys dentro do BD
    public function executar($query, $params = [])
    {

        try {
            if ($params == null) {
                $sql = $this->getConexao()->prepare($query);
                $sql->execute();
                if ($sql->rowCount() > 0) {
                    return $sql->fetchAll();
                } else {
                    return false;
                }
            } else {
                $statement = $this->conexao->prepare($query);
                $statement->execute($params);
                return $statement;
            }
        } catch (PDOException $e) {
            die("ERRO: " . $e->getMessage());
        }
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function getConexao()
    {
        return $this->conexao;
    }

    //Responsável por inserir dados no BD [field => value]  return integer
    public function inserir($values)
    {
        //Dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        //Monta a query
        $query = 'INSERT INTO ' . $this->tabela . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')';

        //Executa o insert
        $this->executar($query, array_values($values));

        //Retorna o id inserido
        return $this->conexao->lastInsertId();
    }

    //Responsável por executar uma consulta no BD [return PDOStatement]
    public function select($where = null, $order = null, $limit = null, $fields = '*')
    {
        //Dados da query
        $where = strlen($where) ? 'WHERE ' . $where : '';
        if (is_array($order) == false && $order != null && count($order) < 2) {
            $order = strlen($order) ? 'ORDER BY ' . $order : '';
        }elseif($order != null){
           
           
            $txtOrderFinal = "ORDER BY ";
            for($d = 0; $d <= count($order); $d++){
                if(isset($order[$d])){
                    $ord = $order[$d];
                }else{
                    $ord = null;
                }
                
                
                if($ord != null){
                    $txtOrderFinal = $txtOrderFinal . $ord . ", ";
                }else{
                    $i = strlen($txtOrderFinal);
                    $txtOrderFinal = substr($txtOrderFinal, 0, $i - 2);
                    
                }
            }
            $order = $txtOrderFinal;
            
        }else{
            $order = strlen($order) ? 'ORDER BY ' . $order : '';
        }
        $limit = strlen($limit) ? 'LIMIT ' . $limit : '';

        //Monta a query
        if (is_array($fields)) {
            $query = 'SELECT ' . implode(",", $fields) . ' FROM ' . $this->tabela . ' ' . $where . ' ' . $order . ' ' . $limit;
        } else {
            $query = 'SELECT ' . $fields . ' FROM ' . $this->tabela . ' ' . $where . ' ' . $order . ' ' . $limit;
        }

            //var_dump($query);

        //Executa a Query
        return $this->executar($query);
    }

    public function atualizar($where, $values)
    {
        //Dados da query
        $fields = array_keys($values);
        $query = 'UPDATE ' . $this->tabela . ' SET ' . implode('=?,', $fields) . '=? WHERE ' . $where;

        $result = $this->executar($query, array_values($values));

        return $result;
    }
}
