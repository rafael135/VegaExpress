    <head>
        <link rel="stylesheet" href="includes/visualizacaoProduto.css">
    </head>

    <?php

    use App\Autor;
    use App\Avaliacao;
    use App\Comentario;
    use App\money_format;
    use App\Produto;
    use App\Usuario;
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
        header("Location: ../index.php");
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
                                <p class="text-start text-blue fs-2" id="produtoTxt"><?php echo ($titulo); ?></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 m-0 p-0">
                            <div class="container-fluid p-0 m-0">
                                <p class="text-start text-success fs-2 fw-bolder" id="produtoTxt"><?php echo ($money->money_format("%.2n", $preco)); ?></p>
                            </div>
                        </div>


                    </div>
                    <div class="row">

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
                $imgAutor = $dados['imgPerfil'];
                $destino = "UsrImg/" . $idUsr . "/fotoPerfil/" . $imgAutor;
                ?>

                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="row pt-4">
                            <div class="col-12">
                                <div class="card" style="height: 200px;">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="<?php
                                                        if ($imgAutor != "0") {
                                                            echo ($destino);
                                                        } else {
                                                            echo ("img/imgPadraoUser.svg");
                                                        }
                                                        ?>" class="card-img img-fluid rounded-0" style="max-height:200px; padding-bottom:2px;" alt="">
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

                    <div class="col-sm-2 offset-sm-8 col-md-2 offset-md-2 col-lg-2 offset-lg-2 align-self-end pe-0">
                        <a class="" href="ActionPHP/adicionarCarrinho.php?idPub=<?php echo($idPub); ?>"><button class="btn btn-cart border align-text-bottom border-0 rounded-0 w-100 mt-4" title="Adicionar ao carrinho"><span class="material-icons m-1 blue">add_shopping_cart</span></button></a>
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2 ps-0 align-self-end">
                        <a class="" href=""><button class="btn btn-cart border-0 rounded-0 w-100 align-items-center mb-1 pb-2 pt-3 text-center">Comprar</button></a>
                    </div>
                </div>
            </div>




            <div class="row justify-content-center align-items-center pt-3">
                <div class="col-12">
                    <button class="btn btn-pub rounded-0 w-100 border border-1" style="max-height:50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescricao" aria-expanded="false" aria-controls="collapseDescricao">
                        <div class="row">
                            <div class="col-10 offset-1">
                                <div class="container-fluid my-auto p-0">
                                    <p class="text-center align-self-center m-auto fs-5 h-100 w-100">Descrição</p>
                                </div>
                            </div>

                            <div class="expand col-1 d-flex justify-content-end">
                                <img class="svg expand-more svg-btn" src="img/btns/expand.svg"></img>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

            <div class="collapse mt-0 mb-0" id="collapseDescricao">
                <div class="container-fluid bg-whiteGrey border border-1 p-0 pb-2 pt-2 m-0">
                    <div class="container-fluid pt-1 mt-1">
                        <div class="row mt-0 pt-0 mx-1">
                            <div class="col-sm-12 col-md-12 col-lg-12 m-0 p-0">
                                <div class="container-fluid p-0 h-100">
                                    <textarea class="form-control form-control-lg rounded-0" id="txtDescricao" disabled style="text-align: justify;"><?php echo (nl2br($descricao)); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>









            <div class="row justify-content-center align-items-center pt-3">
                <div class="col-12">
                    <button class="btn btn-pub rounded-0 w-100 border border-1" style="max-height:50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAvaliacao" aria-expanded="false" aria-controls="collapseAvaliacao">
                        <div class="row">
                            <div class="col-1 d-flex justify-content-start">
                                <img class="svg star-rate svg-btn" src="img/btns/star_rate.svg"></img>
                            </div>

                            <div class="col-10">
                                <div class="container-fluid my-auto p-0">
                                    <p class="text-center align-self-center m-auto fs-5 h-100 w-100">Avaliações</p>
                                </div>
                            </div>

                            <div class="expand col-1 d-flex justify-content-end">
                                <img class="svg expand-more svg-btn" src="img/btns/expand.svg"></img>
                            </div>
                        </div>
                    </button>
                </div>
            </div>

            <div class="collapse <?php if(isset($_GET['selectAvaliacao'])) { echo("show"); } ?> mt-0 mb-0" id="collapseAvaliacao">
                <div class="container-fluid bg-whiteGrey border border-1 p-0 pb-2 pt-2 m-0">
                    <div class="row">
                        <form class="" method="GET" action="produto.php">
                            <div class="row m-1 mb-0 mx-auto">
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

                                <input type="number" hidden value="<?php echo($idPub); ?>" name="id">

                                <div class="col-sm-12 col-md-2 col-lg-2">
                                    <button type="button" class="btn btn-svg-avaliacao w-100 h-100" data-bs-toggle="modal" data-bs-target="#avaliarModal">Avaliar</button>
                                </div>

                                <div class="col-sm-12 col-md-4 col-lg-2">
                                    <button type="submit" class="btn btn-svg-avaliacao w-100 h-100"><img class="svg svg-white" src="UIcons/svg/fi-rs-search.svg"></button>
                                </div>

                                <div class="col-sm-6 col-md-4 col-lg-4 offset-md-4 offset-lg-0">
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

                        <div class="modal fade" id="avaliarModal" tabindex="-1" aria-labelledby="avaliarModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="avaliarModalLabel">Avaliar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="ActionPHP/novaAvaliacao.php" method="POST">
                                        <div class="modal-body">

                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" required minlength="4" id="titulo" name="titulo" placeholder="Título">
                                                <label for="titulo">Título</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" id="textoComent" name="texto" required minlength="8" placeholder="Descreva sua experiência"></textarea>
                                                <label for="textoComent">Descreva sua experiência</label>
                                            </div>
                                            <script src="includesPag/includesProduto/textAreaAutoHeight.js"></script>
                                            <hr class="mx-2" />

                                            <input type="number" hidden name="idPub" value="<?php echo ($idProduto); ?>">

                                            <h5>Como você avalia o produto?</h5>


                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avaliacaoRadio" id="estrela1" value="1">
                                                <label class="form-check-label" for="estrela1">1 <img class="svg star-rate fill-star" src="img/btns/star_rate.svg"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avaliacaoRadio" id="estrela2" value="2">
                                                <label class="form-check-label" for="estrela2">2 <img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avaliacaoRadio" id="estrela3" value="3">
                                                <label class="form-check-label" for="estrela3">3 <img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avaliacaoRadio" id="estrela4" value="4">
                                                <label class="form-check-label" for="estrela4">4 <img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="avaliacaoRadio" id="estrela5" value="5">
                                                <label class="form-check-label" for="estrela5">5 <img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"><img class="svg star-rate fill-star" src="img/btns/star_rate.svg"></label>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Avaliar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="hr-coments mx-3" />

                    <div class="container-fluid pt-1 mt-1">
                        <div class="row mt-0 pt-0">
                            <?php
                            $avaliacao = new Avaliacao();
                            $avaliacoes = $avaliacao->getPubComentarios($idProduto);
                            if ($avaliacoes != false) {


                                foreach ($avaliacoes as $coment) {

                                    $tituloComent = $coment['titulo'];
                                    $textoComent = $coment['txtComentario'];
                                    $avalicaoComent = intval($coment['avaliacao']);
                                    $avaliacaoIdAutor = intval($coment['idAutor']);
                                    $autorComent = new Autor();
                                    $dadosComentAutor = $imgAvalicaoAutor = $autorComent->getInformacoesAutor($avaliacaoIdAutor);
                                    $nomeAutorAvaliacao = $dadosComentAutor['nome'];
                                    $imgAvalicaoAutor = $dadosComentAutor['imgPerfil'];
                                    $destinoImgComent = "";
                                    if ($imgAvalicaoAutor != "") {
                                        $destinoImgComent = "UsrImg/" . $avaliacaoIdAutor . "/fotoPerfil/" . $imgAvalicaoAutor;
                                    } else {
                                        $destinoImgComent = "img/imgPadraoProduto.png";
                                    }

                            ?>
                                    <div class="col-sm-12 col-md-12 col-lg-6 mb-2">
                                        <div class="card card-user">
                                            <div class="row">

                                                <div class="col-sm-5 col-md-4 col-lg-3 pe-0">
                                                    <img src="<?php echo ($destinoImgComent); ?>" class="card-img-top card-img-comentario card-user" alt="...">
                                                </div>
                                                <div class="col-sm-7 col-md-8 col-lg-9 ps-0">
                                                    <div class="card-body overflow-auto m-0 p-0 card-user">
                                                        <h4 class="card-title">
                                                            <div class="container-fluid m-0 mb-1 p-0 w-100 bottom-separator">
                                                                <?php
                                                                for ($i = 0; $i < 5; $i++) {
                                                                    if ($avalicaoComent > 0) {
                                                                ?>
                                                                        <img class="svg star-rate fill-star" src="img/btns/star_rate.svg">
                                                                    <?php
                                                                        $avalicaoComent--;
                                                                    } else {
                                                                    ?>
                                                                        <img class="svg star-rate fill-star-deact" src="img/btns/star_rate.svg">
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </div>
                                                        </h4>
                                                        <h5 class="ms-2"><?php echo ($nomeAutorAvaliacao); ?></h5>
                                                        <div class="container-fluid h-100 p-0 m-0 bg-user-coment">
                                                            <p class="card-text ms-2"><?php echo (nl2br($textoComent)); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                }
                            } else {
                                ?>
                                <div class="container-fluid p-0 m-0 w-100 h-100">
                                    <p class="fw-bold display-6 text-center">Nenhuma avaliação</p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <script src="../ActionsJS/containerAction.js">

    </script>