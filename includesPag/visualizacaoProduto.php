    <head>
        <link rel="stylesheet" href="includes/visualizacaoProduto.css">
    </head>

    <?php

    use App\Autor;
    use App\money_format;
    use App\Produto;
    use FFI\ParserException;

    require_once("vendor/autoload.php");

    $produto = new Produto();
    $idPub = $_GET['id'];
    $publicacao = $produto->getProdutoId($idPub);

    if ($publicacao != false) {
        $titulo = $publicacao[0]['titulo'];
        $descricao = $publicacao[0]['descricao'];
        $preco = $publicacao[0]['preco'];
        $idProduto = $publicacao[0]['idProduto'];
        $idAutor = $publicacao[0]['idAutor'];
        $money = new money_format();
        $imgs = $publicacao[0]['imagens'];
        $imgs = explode(" ", $imgs);
    } else {
        $titulo = "Página não existe!";
        $descricao = "";
        $preco = "";
        $idProduto = "";
        $money = new money_format();
        $imgs = $publicacao[0]['imagens'];
    }

    ?>

    <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
    <script src="JQuery 3.6.0/jquery.zoom.min.js"></script>
    <script src="ActionsJS/imgZoom.js"></script>
    <script>
        $(document).ready(function() {
            $(".img-zoom").zoom();
        });
    </script>

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

    <div class="container-fluid px-3">
        <div class="container-fluid mae py-2">
            <div class="row mx-auto">
                <div class="col-sm-12 col-md-12 col-lg-3 ms-0 ps-0 me-0 pe-0" id="imgCol">
                    <div class="card m-0 p-0 w-100" id="img">
                        <div id="carouselExampleIndicators" class="carousel w-100 me-0 pe-0 slide" id="img" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php
                                $ac = 0;
                                foreach ($imgs as $img) {
                                    $txt = "";
                                    if ($ac == 0) {
                                        $txt = " class='active' aria-current='true'";
                                    }

                                ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to='<?php echo ($ac); ?>' <?php echo ($txt); ?> aria-label="Slide 1"></button>

                                <?php
                                    $ac++;
                                }
                                ?>
                            </div>
                            <div class="carousel-inner">

                                <?php
                                $ac = 0;
                                foreach ($imgs as $img) {
                                    if ($img != "") {
                                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/$img";
                                    } else {
                                        $destinoImg = "img/imgPadraoProduto.png";
                                    }

                                    //var_dump($destinoImg);
                                    $txt = "";
                                    if ($ac == 0) {
                                        $txt = "active";
                                    }

                                    echo ("<div class='carousel-item $txt'>
                                        <span class='img-zoom'>
                                            <img src='$destinoImg' class='d-block w-100 img-zoom' id='img' alt=''>
                                        </span>
                                    </div>");

                                    $ac++;
                                }
                                ?>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-9">
                    <div class="row ms-1">
                        <div class="col-12 ms-0 ps-0">
                            <div class="container-fluid w-100 p-0 m-0 mt-1">
                                <p class="text-start text-blue fs-3" id="produtoTxt"><?php echo ($titulo); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 m-0 p-0">
                            <div class="container-fluid p-0 m-0">
                                <p class="text-start text-success" id="produtoTxt"><?php echo ($money->money_format("%.2n", $preco)); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-10 m-0 p-0">
                            <div class="container-fluid p-0 h-100">
                                <label for="txtDescricao" class="form-floating form-text">Descricão</label>
                                <textarea class="form-control form-control-lg" id="txtDescricao" disabled style="text-align: justify;"><?php echo ($descricao) ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3 offset-lg-9">
                            <div class="container-fluid p-0 m-0 mt-5">
                                <a href=""><button class="btn btn-cart border border-1 h-100 w-100"><span class="material-icons m-1 blue">add_shopping_cart</span></button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="col-12">
                    <div class="row">
                        <div class="container-fluid p-0 mt-4 m-0 bg-blue" style="border-radius: 0 !important;">
                            <p class="display-5 p-2 text-white">Autor:</p>
                        </div>
                    </div>-->

                <?php
                $autor = new Autor();
                $dados = $autor->getInformacoesAutor($idAutor);
                $nomeAutor = $dados['nome'];
                $AutorId = $dados['id'];
                ?>

                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="row pt-4">
                            <div class="col-12">
                                <div class="card" style="height: 200px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="img/proj5.jpg" class="card-img img-fluid rounded-0" style="max-height:200px; padding-bottom:2px;" alt="">
                                        </div>
                                        <div class="col-8">
                                            <div class="card-body">
                                                <h5 class="card-title fs-3"><?php echo ($nomeAutor); ?></h5>
                                                <p class="card-text">Nota: </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">

                    </div>
                </div>
            </div>

            <div class="row justify-content-center align-items-center pt-3">
                <div class="col-12">
                    <button class="btn btn-pub rounded-0 w-100 border border-1" style="max-height:50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAvaliacao" aria-expanded="false" aria-controls="collapseAvaliacao">
                        <div class="row">
                            <div class="col-1">
                                <img class="svg star-rate svg-btn" src="img/btns/star_rate.svg"></img>
                            </div>

                            <div class="col-10">
                                <div class="container-fluid my-auto p-0">
                                    <p class="text-center align-self-center m-auto fs-5 h-100 w-100">Avaliações</p>
                                </div>
                            </div>

                            <div class="expand col-1 align-items-start">
                                <img class="svg expand-more svg-btn" src="img/btns/expand.svg"></img>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

            <div class="collapse" id="collapseAvaliacao">
                <div class="container-fluid bg-whiteGrey border border-1 p-0 m-0">
                    <div class="row">
                        <form class="" method="POST" action="../produto.php">
                            <div class="row m-1 mx-auto">
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="form-floating select-avaliacao">
                                        <select class="form-select border border-1 rounded-0 select-avaliacao" id="selectAvaliacao" name="selectAvaliacao" aria-label="Avaliação">
                                            <option value="1">1 estrela</option>
                                            <option value="2">2 estrelas</option>
                                            <option value="3">3 estrelas</option>
                                            <option value="4">4 estrelas</option>
                                            <option value="5">5 estrelas</option>
                                        </select>
                                        <label class="form-label" for="selectAvaliacao">Avaliação</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4 offset-md-4 offset-lg-4">
                                    <div class="form-floating select-avaliacao rounded-0">
                                        <select class="form-select border border-1 rounded-0 select-avaliacao" id="selectRelevancia" name="selectRelevancia" aria-label="Filtrar por">
                                            <option value="1">Mais recentes</option>
                                            <option value="2">Mais antigos</option>
                                            <option value="3">Mais relevantes</option>
                                            <option value="4">Menos relevantes</option>
                                        </select>
                                        <label class="form-label" for="selectRelevancia">Filtrar por</label>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4 offset-sm-3">

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <div class="container-fluid top-separator">
                            <div class="card">
                                <div class="row">

                                    <div class="col-3">
                                        <img src="img/imgPadraoProduto.png" class="card-img-top card-img-comentario" alt="...">
                                    </div>
                                    <div class="col-9">
                                        <div class="card-body">
                                            <h5 class="card-title">Nome usuário</h5>
                                            <p class="card-text">Opinião do usuário</p>
                                            <img class="svg star-rate fill-star" src="img/btns/star_rate.svg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <script src="../ActionsJS/containerAction.js">

    </script>