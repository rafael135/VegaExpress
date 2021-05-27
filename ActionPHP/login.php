<?php
    require_once '../vendor/autoload.php';
    use App\Usuario;
    
    session_start();
    

    if($_POST){
        $cont = 0;
        $emailCelular;
        $senha;

        if(!empty($_POST['emailCelular'])){
            $emailCelular = addslashes($_POST['emailCelular']);
        }else{
            $_SESSION['erro'][10] = "Campo obrigatório!";
            $cont++;
        }

        if(!empty($_POST['senhaLogin'])){
            $senha = addslashes($_POST['senhaLogin']);
        }else{
            $_SESSION['erro'][11] = "Campo obrigatório!";
            $cont++;
        }


        if($cont == 0){
            $usuario = new Usuario();
            $usuario->login($emailCelular, $senha);
            if($_SESSION['idUsuario'] == null){
                $_SESSION['erro'][13] = "Email ou celular não registrados!";
                $cont++;
                header("Location: ../registroEmpresa.php?error=$cont");
                die;
            }
            header("Location: ../index.php");
        }else{
            header("Location: ../registroEmpresa.php?error=$cont");
        }
        
    }
?>