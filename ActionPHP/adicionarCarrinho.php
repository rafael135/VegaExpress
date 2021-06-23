<?php
    require_once '../vendor/autoload.php';

    session_start();

    if(isset($_SESSION['idUsuario'])){
        if($_GET){
            $idPubAdd = intval($_GET['idPub']);

            if(!isset($_SESSION['conteudoCarrinho'])){
                $_SESSION['conteudoCarrinho'] = array(
                    $idPubAdd
                );
                //header("Location: ../produto?id=$idPubAdd");
            }else{
                $sessaoArray = $_SESSION['conteudoCarrinho'];
                $numCount = $_SESSION['conteudoCarrinho'][0];
                $sessaoJuntar = array(
                    $idPubAdd
                );
                $resultadoPesquisa = array_search($idPubAdd, $sessaoArray, true);
                if($resultadoPesquisa == false){
                    $sessaoArray = array_merge($sessaoArray, $sessaoJuntar);
                    var_dump($sessaoArray);
                }

                
                
            }

            //unset($_SESSION['conteudoCarrinho']);
            
        }else{
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
