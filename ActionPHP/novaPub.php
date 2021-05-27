<?php
use App\Publicacao;

require_once '../vendor/autoload.php';
$status = session_status();
if(session_status() == 2){
    session_start();
}
    
    
    

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $preco = (double)$_POST['preco'];

    if($preco <= 0){
        $_SESSION['erro'][14] = "Preço não válido!";
        header("Location: ../perfil.php");
    }

    $Pub = new Publicacao();
    $idPub = $Pub->registrarPublicacao($titulo, $descricao, $preco);

    $destino = "../UsrImg/" . $_SESSION['idUsuario'] . "/Produtos/" . $idPub . "/";

    
    if(is_dir($destino) == false){
        mkdir($destino, 0777, true);
    }
    //$destino = $destino . "/";

    $formatosPermitidos = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG'];

    $imagensProduto = $_FILES['imagens'];
    
    

    $nomeArquivos = $imagensProduto['name'];

    for($i = 0; $i < count($nomeArquivos); $i++){
        $extensao = explode('.', $nomeArquivos[$i]);
        
        $extensao = end($extensao);
        $extensao = strtolower($extensao);
        
        //var_dump($nomeArquivos);
        //echo($extensao);
        $nomeGravar = "$i" . "." . $extensao;

        if(in_array($extensao, $formatosPermitidos)){
            
            $resultado = move_uploaded_file($imagensProduto['tmp_name'][$i], $destino . $nomeGravar);

            if($extensao == "jpg" || $extensao == "jpeg"){
                $imgGravar = imagecreatefromjpeg($destino . $nomeGravar);
                imagejpeg($imgGravar, $destino . $nomeGravar, 60);
            }elseif($extensao == "png"){
                $imgGravar = imagecreatefrompng($destino . $nomeGravar);
                imagepng($imgGravar, $destino . $nomeGravar, 7);
            }

            
            $Pub->inserirImagens($nomeGravar);
        }
    }

    header("Location: ../produto.php?id=$idPub")

?>