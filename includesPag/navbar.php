<!DOCTYPE html>
<html lang="pt-br">

<head>
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

    <script src="https://kit.fontawesome.com/e19fb67a3c.js" crossorigin="anonymous"></script>



    <title>Vega Express</title>
</head>

<body>

    <?php
    if (isset($_SESSION['idUsuario'])) {

        $verificado = $_SESSION['usuarioVerificado'];
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
    


    <!-- "navbar" declara o nav como uma navbar para o Bootstrap, "navbar-expand-lg" é para os componentes da navbar aparecerem apenas quando a tela for maior que (720p) -->
    <!-- "navbar-dark" e "bg-dark" são os temas da navbar, "shadow-sm" é para adicionar uma pequena sombra, e "mb-1" é para adicionar um espaçamento abaixo da Navbar para separar dos outros componentes -->
    <nav class="navbar navbar-expand navbar-light bg-light shadow">
        <!-- "container-fluid" é um container que ocupa a tela inteira na horizontal, "align-items-center" é para alinhar os componentes no centro -->
        <div class="container-fluid">
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav me-auto">
                    <a class="btn border border-1 rounded m-0 p-0 rounded-3 bg-light h-100 w-100" href="sobreN.php">
                        <div class="btn-group w-100 h-100 p-0 m-0" role="group" id="grupo-sobre" aria-label="Sobre Nós">
                            <button type="button" id="btn-sobre" class="btn-dropdown-custom p-0 m-0 me-1 h-100 w-auto text-center">
                                <span class="material-icons blue text-center m-1" id="btn-sobre-icon" style="font-size:32px;">
                                    info
                                </span>
                            </button>

                            <button type="button" id="btn-sobre-txt" class="btn-dropdown-custom p-2 m-0 my-auto h-100 w-auto rounded-0 text-center text-white w-100">
                                Sobre Nós
                            </button>
                        </div>
                    </a>
                </ul>
            </div>

            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php"><img src="img/LogoTCC_Final.png" height="40"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn border border-1 rounded rounded-3 bg-light h-100 w-100" href="carrinho.php"><span class="text-center material-icons blue m-1" style="font-size:32px;">shopping_cart</span></a>
                    </li>

                    <li class="nav-item">
                        <div class="btn-group dropstart mx-3">
                            <a class="btn border-1 rounded rounded-3 justify-content-center align-content-center bg-light text-white" id="menu-user" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUsuario" aria-controls="offcanvasUsuario">
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
                            ?>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUsuario" aria-labelledby="offcanvasUsuarioLabel">
                                <div class="offcanvas-header offcanvas-user p-1">

                                    <div class="card w-100" style="height:100px;">
                                        <div class="row">

                                            <div class="col-4">
                                                <img class="card-img me-1" src="img/proj5.jpg" style="height: 100px;" alt="">
                                            </div>

                                            <div class="col-8">
                                                <div class="card-body ps-0 ms-0">
                                                    <h4 class="card-title"><?php echo ($nomeUsuario); ?></h4>
                                                    <p class="card-text <?php if (!isset($verificado)) {
                                                                            echo ("text-danger");
                                                                        } else {
                                                                            if ($verificado == false) {
                                                                                echo ("text-danger");
                                                                            }
                                                                        } ?>"><?php
                                                                                if (!isset($_SESSION['idUsuario'])) {
                                                                                } else {

                                                                                    if ($verificado == false) {
                                                                                        echo ("<span class='material-icons red'>dangerous</span> Conta não verificada!");
                                                                                    } else {
                                                                                        echo ("<span class='material-icons text-success'>check</span> Conta verificada");
                                                                                    }
                                                                                }
                                                                                ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<h5 class="offcanvas-title" id="offcanvasUsuarioLabel">Offcanvas with backdrop</h5>-->
                                    <button type="button" class="btn-close-custom text-end m-0 pb-5" data-bs-dismiss="offcanvas" aria-label="Close"><span class="material-icons" style="font-size:24px;">close</span></button>
                                </div>
                                <div class="offcanvas-body offcanvas-UOptions p-1">
                                    <ul class="nav nav-pills flex-column mb-auto">
                                        <?php


                                        if (isset($_SESSION['idUsuario']) == true) {

                                        ?>

                                            <li class="nav-item userOption mb-1" id="userConfig">
                                                <a class="nav-link btn-group w-100" href="perfil.php">
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

                                            <li class="nav-item userOption mb-1" id="userLogout">
                                                <a class="nav-link w-100" href="actionPHP/logout.php?id=<?php echo ($_SESSION['idUsuario']); ?>">
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
                                                <a class="nav-link w-100" href="registroEmpresa.php">
                                                    <i class="fas fa-sign-in-alt"></i> Entrar
                                                </a>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <script src="../ActionsJS/dropdownButtonsAnim.js"></script>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>