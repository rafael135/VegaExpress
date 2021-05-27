<?php
require_once '../vendor/autoload.php';

use App\Database;
use App\Usuario;

session_start();
$cont = 0;

if (isset($_POST) == true) {
    if ($_POST['nomeP'] == "" || $_POST['nomeS'] == "") {
        // 0
        $_SESSION['erro'][0] = "Nome não preenchido!";
        $cont++;
    }
    $nome = $_POST['nomeP'] . " " . $_POST['nomeS'];
    if ($_POST['email'] == "" || str_contains($_POST['email'], '@') != true) {
        // 1
        $_SESSION['erro'][1] = "E-mail não preenchido ou incorreto!";
        $cont++;
    }
    $email = $_POST['email'];
    
    $senha = $_POST['senhaP'];
    $repeticaoSenha = $_POST['senhaR'];

    if ($repeticaoSenha != $senha) {
        // 3
        $_SESSION['erro'][3] = "Senhas diferentes!";
        $cont++;
    } else {
        if ($senha == "" || count_chars($senha) < 8 || $repeticaoSenha == "" || count_chars($repeticaoSenha) < 8) {
            // 2
            $_SESSION['erro'][2] = "Senha não preenchida ou menor que 8 caracteres!";
            $cont++;
        } else {
        }
    }


    if ($_POST['endereco'] == "") {
        // 4
        $_SESSION['erro'][4] = "Digite as informações de endereço!";
        $cont++;
    }

    if ($_POST['cep'] == "") {
        // 5
        $_SESSION['erro'][5] = "Digite o CEP!";
        $cont++;
    } else {
        $cep = $_POST['cep'];

        if (!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {
            // 6
            $_SESSION['erro'][6] = "CEP inválido!";
            $cont++;
        }
    }

    if($_POST['numero'] == ""){
        $_SESSION['erro'][7] = "Número não preenchido!";
        $cont++;
    }

    if($_POST['cidade'] == ""){
        $_SESSION['erro'][8] = "Cidade não preenchido!";
        $cont++;
    }

    $endereco = $_POST['endereco'] . " " . $_POST['cep'] . " " . $_POST['numero'] . " " . $_POST['cidade'] . " " . $_POST['estado'];

    $celular = $_POST['celular'];
    if ($celular == "" || strlen($celular) < 11) {
        // 5
        $_SESSION['erro'][9] = "Número de celular não preenchido ou incorreto!";
    }
    

    $obUser = new Usuario();
    $verificacao = $obUser->getDados("email = '" . $email . "' OR celular = '" . $celular . "'", "email, celular");
    if($verificacao == false){

    }else{
        $_SESSION['erro'][12] = "Email ou celular já cadastrados!";
        $cont++;
    }


    if ($cont == 0) {
        $usuario = new Usuario(0, $nome, $email, $senha, $endereco, $celular);
        $id = $usuario->cadastrar();
        //$_SESSION['idUsuario'] = $id;
        $usuario->login($email, $senha, "*", true);
        
        header("Location: ../index.php");
    } else {
        header("Location: ../registroEmpresa.php?error=$cont");
    }
}
