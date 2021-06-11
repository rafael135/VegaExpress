<?php

use App\Usuario;

require_once '../vendor/autoload.php';

if ($_POST || $_FILES) {

    $cont = 0;
    session_start();

    $user = new Usuario();
    $idUser = $_SESSION['idUsuario'];

    if (isset($_POST['mudarNome'])) {
        $nome = $_POST['mudarNome'];
        if($nomeR = $user->mudarNome($idUser, $nome)){
            $_SESSION['nomeUsuario'] = $nome;
        }else{
            $cont++;
        }
        header("Location: ../perfil.php");
    }


    if (isset($_FILES['imgPerfil'])) {

        $destino = "../UsrImg/" . $idUser . "/fotoPerfil/";

        if (is_dir($destino) == false) {
            mkdir($destino, 0777, true);
        }

        $formatosPermitidos = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'];

        $img = $_FILES['imgPerfil'];


        $nomeArquivo = $img['name'];


        $extensao = explode('.', $nomeArquivo);
        $extensao = end($extensao);
        $extensao = strtolower($extensao);

        $x = (int)$_POST['coordX'];
        $y = (int)$_POST['coordY'];
        $w = (int)$_POST['coordWidth'];
        $h = (int)$_POST['coordHeight'];

        $nomeGravar = "imagemPerfil" . "." . $extensao;

        var_dump($nomeGravar);
        if (in_array($extensao, $formatosPermitidos)) {

            $resultado = move_uploaded_file($img['tmp_name'], $destino . $nomeGravar);

            if ($extensao == "jpg" || $extensao == "jpeg") {
                $imgGravar = imagecreatefromjpeg($destino . $nomeGravar);
                $imgGravar = imagecrop($imgGravar, [
                    'x' => $x,
                    'y' => $y,
                    'width' => $w,
                    'height' => $h
                ]);
                
                imagejpeg($imgGravar, $destino . $nomeGravar, 60);
            } elseif ($extensao == "png") {
                $imgGravar = imagecreatefrompng($destino . $nomeGravar);
                $imgGravar = imagecrop($imgGravar, [
                    'x' => $x,
                    'y' => $y,
                    'width' => $w,
                    'height' => $h
                ]);
                
                imagepng($imgGravar, $destino . $nomeGravar, 7);
            }

            $user->mudarFotoPerfil($idUser, $nomeGravar);

            
        }else{
            $cont++;
        }
    }

    header("Location: ../perfil.php");
} else {
    header("Location: ../");
}
