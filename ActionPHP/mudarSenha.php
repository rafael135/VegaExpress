<?php
session_start();

use App\Usuario;

require_once '../vendor/autoload.php';

$usr = new Usuario();
if ($_POST) {
    if (isset($_SESSION['idUsuario'])) {
        $senhaAnterior = $_POST['passwordAnterior'];
        $id = $_SESSION['idUsuario'];

        $verificarSenha = $usr->getDados("id = $id", "senha");
        $verificarSenha = $verificarSenha[0]["senha"];

        if ($senhaAnterior == $verificarSenha) {
            $senha = $_POST['passwordTrocaConfirmar'];
            $resultado = $usr->mudarSenha($id, $senha);
            if($resultado == true){
                $_SESSION['senhaAlterada'] = true;
                header("Location: ../perfil.php?id=1");
            }else{
                $_SESSION['senhaAlterada'] = false;
                header("Location: ../perfil.php?id=1");
            }
        }else{
            $_SESSION['senhaErrada'] = true;
            header("Location: ../perfil.php?id=1");
        }
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}
