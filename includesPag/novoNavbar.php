<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">

  <link rel="icon" type="img/ico" href="img/LogoTCC.ico">
  <!-- CSS do Bootstrap -->
  <link rel="stylesheet" href="bootstrap-5.0.0B3/css/bootstrap.min.css">
  <!-- Ícones do Google -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- ícones Bootstrap do Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
  <!-- Linha obrigatória do Bootstrap -->
  <!-- CSS para customizar links dos produtos e outras coisas -->
  <link rel="stylesheet" href="includes/link.css">
  <link rel="stylesheet" href="includes/fadeIn.css">
  <link rel="stylesheet" href="includes/navitems.css">
  <link rel="stylesheet" href="includesPag/includesNavbar/navbar.css">

  <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/e19fb67a3c.js" crossorigin="anonymous"></script>
  <!--<link href="UIcons/css/uicons-regular-straight.css" rel="stylesheet">-->



  <title>Vega Express</title>
</head>

<body>

  <script>
    jQuery(document).ready(function() {
      /*  Replace all SVG images with inline SVG */
      $('img.svg').each(function() {
        var $img = $(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        $.get(imgURL, function(data) {
          // Get the SVG tag, ignore the rest
          var $svg = $(data).find('svg');
          // Add replaced image's ID to the new SVG
          if (typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
          }
          // Add replaced image's classes to the new SVG
          if (typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass + ' replaced-svg');
          }
          // Remove any invalid XML tags as per http://validator.w3.org
          $svg = $svg.removeAttr('xmlns:a');
          // Replace image with new SVG
          $img.replaceWith($svg);
        });
      });
    });
  </script>

  <?php

  use App\Usuario;

  $logado = false;
  if (isset($_SESSION['idUsuario'])) {
    if (PHP_SESSION_ACTIVE) {
    } else {
      session_start();
    }
    $verificado = $_SESSION['usuarioVerificado'];
    $logado = true;
    if ($verificado != null) {
      if ($verificado == "false") {
        $verificado = false;
      } else {
        $verificado = true;
      }
    } else {
      $verificado = false;
    }
  }
  ?>

  <?php
  if (PHP_SESSION_ACTIVE) {
  } else {
    session_start();
  }
  if (isset($_SESSION['idUsuario'])) {
    $nomeUsuario = $_SESSION['nomeUsuario'];
  } else {
    $nomeUsuario = "Faça login!";
  }
  if (isset($_SESSION['idUsuario'])) {
    $idUsr = $_SESSION['idUsuario'];
    $user = new Usuario();
    $imgPerfil = $user->getDados("id = $idUsr", "imgPerfil");
    $imgPerfil = $imgPerfil[0]['imgPerfil'];
    $destino = "UsrImg/" . $idUsr . "/fotoPerfil/" . $imgPerfil;
  }
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light py-0">
    <div class="container-fluid px-0">
      <a class="navbar-brand py-0" href="index.php">
        <img class="ms-lg-1" src="img/LogoTCC_Final.png" height="40">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item mx-auto">
            <a class="nav-link" aria-current="page" href="sobreN.php"><span class="text-center material-icons blue m-1" style="max-height: 40px;">info</span></a>
          </li>
          <li class="nav-item mx-auto">
            <a class="nav-link" aria-current="page" href="carrinho.php"><span class="text-center material-icons blue m-1" style="max-height: 40px;">shopping_cart</span></a>
          </li>

          <li class="nav-item navUsr-item mx-auto">
            <a class="nav-link" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-current="page">
              <?php
              if (PHP_SESSION_ACTIVE) {
              } else {
                session_start();
              }
              if (isset($_SESSION['idUsuario'])) {
              ?>
                <span class="text-center material-icons blue m-1" style="max-height: 40px;" id="menuUser">account_circle</span>
              <?php
              } else {
              ?>
                <span class="text-center material-icons red m-1" style="max-height: 40px;" id="menuUser">account_circle</span>
              <?php
              }
              ?>
            </a>
          </li>

            <?php 
              if(PHP_SESSION_ACTIVE){

              }else{
                session_start();
              }
              if(isset($_SESSION['idUsuario'])){

              }else{
            ?>
          <li class="nav-item mx-auto">
            <a class="nav-link" aria-current="page" href="registroEmpresa.php"><span class="text-center material-icons blue m-1" style="max-height: 40px;">login</span></a>
          </li>
          
          <?php
              }
          ?>

        </ul>
        <!--
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        -->
      </div>
    </div>
  </nav>

  <div class="offcanvas offcanvas-menuInfo offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom p-1">
      <h4 class="text-blue m-2" id="offcanvasRightLabel">Informações de Conta</h4>
      <button type="button" class="btn-close btn-closeOffcanvasCustom text-reset me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body offcanvasUsrMenu p-0">
      <div class="container-fluid container-imgUsr p-1 ps-3 m-0 mt-1">
        <div class="row justify-content-start align-content-center me-0">

          <!--<button type="button" class="btn-close-custom text-end m-0 p-0 position-absolute end-0 top-0" data-bs-dismiss="offcanvas" aria-label="Close"><span class="material-icons" style="font-size:24px;">close</span></button>-->

          <div class="col-lg-3 p-0 offcanvasUsrBorder">
            <?php
            if (!isset($imgPerfil) || $imgPerfil == "0") {
            ?>
              <img src=" <?php echo ("img/imgPadraoUser.svg"); ?>" class="card-img svg imgUsrOffcanvas <?php if ($logado == true) {
                                                                                                                                echo ("svg-navbar-userLogin");
                                                                                                                              } else {
                                                                                                                                echo ("svg-navbar-userNoLogin");
                                                                                                                              } ?>">
            <?php
            } else {

            ?>

              <img class="card-img imgUsrOffcanvas m-0 p-0 border-0" src="<?php if (isset($imgPerfil) && $imgPerfil != "0") {
                                                                                                    echo ($destino);
                                                                                                  } else {
                                                                                                    echo ("");
                                                                                                  }
                                                                                                  ?>" alt="">

            <?php } ?>
          </div>

          <div class="col-lg-9 p-0 offcanvasUsrBorder offcanvasUsrNoLeftBorder">
            <div id="containerOffcanvasUsr" class="container-fluid h-100 m-0 p-0">


              <div id="rowNameUsr" class="row align-items-start m-0 g-0">

                <div class="col-12">
                  <p class="text-start m-2 my-1 fs-4 <?php if (!isset($verificado)) {
                                                              echo ("text-danger");
                                                            } else {
                                                              if ($verificado == false) {
                                                                echo ("text-danger");
                                                              }
                                                            } ?>"><?php echo ($nomeUsuario); ?>
                  </p>
                </div>
              </div>

              <div id="rowActiveUsr" class="row flex-grow-1 align-items-end m-0 g-0">
                <div class="col-12">
                  <p id="lblContaVerificada" class="fw-bold text-end ms-0 me-2 mb-0 mt-auto <?php if (isset($verificado) && ($verificado == true)) {
                                                                                                                echo ("text-success");
                                                                                                              } else {
                                                                                                                echo ("text-danger");
                                                                                                              } ?>">
                    <?php
                    if (!isset($_SESSION['idUsuario'])) {
                    } else {

                      if ($verificado == false) {
                        echo ("Conta não verificada!");
                      } else {
                        echo ("Conta verificada");
                      }
                    }
                    ?>
                  </p>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>
    </div>
  </div>
</body>