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


    <nav class="navbar navbar-expand-lg">
        
            <a class="navbar-brand" href="index.php">
                <img class="ms-lg-3" src="img/LogoTCC_Final.png" height="40">
            </a>
            <button class="navbar-toggler ms-sm-3 ms-sm-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <img class="svg" src="UIcons/svg/fi-rs-menu-burger.svg">
            </button>
            <div class="collapse navbar-collapse pt-sm-3 align-content-sm-start align-content-lg-center pt-lg-0" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item mx-sm-5 mx-lg-1 mt-md-3 mt-lg-0">
                        <a class="nav-link p-0" href="#"><a class="btn border btn-navbar border-1 rounded rounded-3 bg-light w-100 justify-content-center align-content-center" title="Sobre nós" href="sobreN.php"><span class="text-center material-icons blue m-1" style="font-size:32px;">info</span></a></a>
                    </li>
                    <li class="nav-item mx-sm-5 mx-lg-1">
                        <a class="nav-link p-0" href="#"><a class="btn border btn-navbar border-1 rounded rounded-3 w-100 justify-content-center align-content-center" title="Carrinho" href="carrinho.php"><span class="text-center material-icons blue m-1" style="font-size:32px;">shopping_cart</span></a></a>
                    </li>
                    <li class="nav-item mx-sm-5 mx-lg-1 me-lg-3">
                        <a class="nav-link p-0" href="#">
                            <div class="btn-group dropstart w-100">
                                <a class="btn border-1 btn-navbar rounded rounded-3 w-100 justify-content-center align-content-center bg-light text-white" id="menu-user" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUsuario" aria-controls="offcanvasUsuario">
                                    <?php
                                    if (PHP_SESSION_ACTIVE) {
                                    } else {
                                        session_start();
                                    }
                                    if (isset($_SESSION['idUsuario'])) {
                                    ?>
                                        <span class="text-center material-icons blue m-1" style="font-size:32px;" id="menuUser">account_circle</span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="text-center material-icons red m-1" style="font-size:32px;" id="menuUser">account_circle</span>
                                    <?php
                                    }
                                    ?>
                                </a>
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
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUsuario" aria_controls="offcanvasRight" aria-labelledby="offcanvasUsuarioLabel">
                                    <div class="offcanvas-header offcanvas-user p-0" id="offcanvas">

                                        <div class="card w-100 card-Usr">


                                            <div class="container-fluid container-imgUsr p-0 m-0 p-2">
                                                <div class="row justify-content-center align-content-center align-items-center">

                                                    <button type="button" class="btn-close-custom text-end m-0 p-0 position-absolute end-0 top-0" data-bs-dismiss="offcanvas" aria-label="Close"><span class="material-icons" style="font-size:24px;">close</span></button>


                                                    <?php
                                                    if (!isset($imgPerfil) || $imgPerfil == "0") {
                                                    ?>
                                                        <img src="<?php echo ("img/imgPadraoUser.svg"); ?>" class="card-img svg rounded rounded-circle <?php if ($logado == true) {
                                                                                                                                                            echo ("svg-navbar-userLogin");
                                                                                                                                                        } else {
                                                                                                                                                            echo ("svg-navbar-userNoLogin");
                                                                                                                                                        } ?>">
                                                    <?php
                                                    } else {

                                                    ?>

                                                        <img class="card-img rounded rounded-circle m-0 p-0 border-0" src="<?php if (isset($imgPerfil) && $imgPerfil != "0") {
                                                                                                                                echo ($destino);
                                                                                                                            } else {
                                                                                                                                echo ("");
                                                                                                                            }
                                                                                                                            ?>" alt="">

                                                    <?php } ?>
                                                </div>
                                            </div>




                                            <div class="card-body m-0">
                                                <h4 class="card-title text-center"><?php echo ($nomeUsuario); ?></h4>
                                                <p class="card-text text-center fw-bold fs-6 <?php if (!isset($verificado)) {
                                                                                                    echo ("text-danger");
                                                                                                } else {
                                                                                                    if ($verificado == false) {
                                                                                                        echo ("text-danger");
                                                                                                    }
                                                                                                } ?>"><?php
                                                                                                    if (!isset($_SESSION['idUsuario'])) {
                                                                                                    } else {

                                                                                                        if ($verificado == false) {
                                                                                                            echo ("Conta não verificada!");
                                                                                                        } else {
                                                                                                            echo ("Conta verificada");
                                                                                                        }
                                                                                                    }
                                                                                                    ?></p>
                                            </div>


                                        </div>

                                        <!--<h5 class="offcanvas-title" id="offcanvasUsuarioLabel">Offcanvas with backdrop</h5>-->
                                        <!---->
                                    </div>
                                    <div class="offcanvas-body offcanvas-UOptions p-0">

                                        <ul class="nav nav-flush flex-column mb-auto">
                                            <?php


                                            if (isset($_SESSION['idUsuario']) == true) {

                                            ?>

                                                <li class="nav-item userOption mb-0" id="userConfig">
                                                    <a class="nav-link nav-userOpt btn-group w-100" href="perfil.php">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                                    <span class="material-icons m-1 blue text-center">
                                                                        settings
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <button type="button" class="btn h-100 text-start w-100 btn-clean">
                                                                    Configurações
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="nav-item userOption mb-0" id="userLogout">
                                                    <a class="nav-link nav-userOpt w-100" href="actionPHP/logout.php?id=<?php echo ($_SESSION['idUsuario']); ?>">
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                                    <span class="material-icons icon blue text-center">
                                                                        logout
                                                                    </span>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <button type="button" class="btn h-100 text-start w-100 btn-clean">
                                                                    Sair
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php
                                            } else {
                                            ?>
                                                <li class="nav-item userOption" id="userLogin">
                                                    <a class="nav-link nav-userOpt w-100" href="registroEmpresa.php">
                                                        <i class="fas fa-sign-in-alt"></i> Entrar
                                                    </a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>



                                </div>

                                <!--<script src="../ActionsJS/dropdownButtonsAnim.js"></script>-->

                            </div>
                        </a>
                    </li>
                </ul>

            </div>
        
    </nav>

    