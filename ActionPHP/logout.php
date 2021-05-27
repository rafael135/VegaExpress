<?php
    session_start();
    if($_GET){
        if(isset($_GET['id']) == true){
            session_destroy();
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
?>