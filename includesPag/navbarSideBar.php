<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="bootstrap-5.0.0B3/css/bootstrap.min.css">
    <!-- Ícones do Google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS para customizar links dos produtos -->
    <link rel="stylesheet" href="includes/link.css">
    <!-- ícones Bootstrap do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <!-- Linha obrigatória do Bootstrap -->
    <!-- Arquivo CSS para customizar a sidebar -->
    <link rel="stylesheet" href="includes/sideBar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">





    <title>Vega Express</title>
</head>

<body>


    <!-- Sidebar  -->
    <nav class="navbar fixed-top Sidenavbar navbar-expand bg-dark d-flex flex-column align-item-start" id="sidebar">
        <a class="navbar-brand text-black-50 align-items-center" href="index.php">
            <img src="img/LogoTCC_Final.png" class="w-100" alt="" class="align-self-center">
        </a>

        <ul class="navbar-nav d-flex flex-column mt-3 w-100 text-center">
            <li class="nav-item d-flex w-100" id="btn-conta">
                <button class="btn btn-side text-white flex-fill text-center" type="button" data-bs-toggle="collapse" data-bs-target="#contaCollapse" aria-expanded="false" aria-controls="contaCollapse"><span class="material-icons text-white m-1" id="menuUser">account_circle</span>
                    <div id="btn-conta-txt">Conta</div>
                </button>
                <div class="collapse w-100" id="contaCollapse">
                    <div class="container-fluid border w-100 p-0 m-0">
                        <?php
                        if ($_SESSION != null) {
                            session_start();
                        }

                        if (isset($_SESSION['idUsuario']) == true) {

                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <a class="nav-link collapse-item-custom text-white">
                                        <div class="btn-group w-100 h-100" role="group" id="grupo-sair" aria-label="Sair">
                                            <button type="button" id="icon" class="btn-side btn-logout p-1 m-0 h-100 w-25 text-center">
                                                <span class="material-icons blue m-1" style="font-size:18px;">
                                                    logout
                                                </span>
                                            </button>

                                            <button type="button" class="btn-side btn-logout p-1 m-0 h-100 w-75 rounded-0 text-center text-white w-100">
                                                Sair
                                            </button>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>
                            <script src="ActionsJS/ActionVerificarSessao.js"></script>
                            <li><a class="dropdown-item btn p-0" id="dropdownSideBar" href="registroEmpresa.php" style="height: 3rem;"><button type="button" class="btn btn-side h-100 w-100 text-center">Entrar</button></a></li>
        <?php
                        }
        ?>
        </div>
        </div>

        </li>

        <li class="nav-item d-flex w-100">
            <button class="btn btn-custom btn-sidebar text-black-50 flex-fill" id="" type="button" data-bs-toggle="collapse" data-bs-target="#testeCollapse" aria-expanded="false" aria-controls="testeCollapse">Collapse</button>
            <div class="collapse w-100" id="testeCollapse">
                <div class="container-fluid border border-2 w-100 p-0 m-0">
                    <div class="row">
                        <div class="col-12">
                            <a class="nav-link collapse-item-custom text-black-50">Teste 1</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a class="nav-link collapse-item-custom text-black-50">Teste 2</a>
                        </div>
                    </div>
                </div>
            </div>

        </li>

        <li class="nav-item w-100">
            <a href="#" class="nav-link text-black-50 pl-4" id="btn-sidebar">Sobre</a>
        </li>

        <li class="nav-item w-100">
            <a href="#" class="nav-link text-black-50 pl-4" id="btn-sidebar">Contato</a>
        </li>
        </ul>
    </nav>
    <div class="container-fluid my-container p-0">
        <nav class="navbar navbar-expand navbar-light">
            <div class="row">
                <div class="col-12">

                    <a href="#" id="menu-btn" class="nav-link link-custom align-content-start mx-2 text-dark"><img id="menu" src="img/menu.svg"></a>

                </div>
            </div>

        </nav>