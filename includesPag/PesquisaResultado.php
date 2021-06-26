<!DOCTYPE html>
<html lang="pt-br">

<body>

    <?php

    use App\Database;
    use App\money_format;
    use App\Produto;

    $obDb = new Database("produtos");
    
    $paginaAtual = 0;

    if ($_GET) {
        $txt = $_GET['txtPesquisa'];
        $frete = $_GET['frete'];
        if ($frete == "1") {
            $frete = 1;
        } else {
            $frete = 0;
        }
        $condicaoProduto = intval($_GET['condicaoProduto']);


        $filtro = intval($_GET['filtro']);

        $filtroPreco = intval($_GET['filtroPreco']);

        if ($_GET['precoMin'] != null) {
            $precoMin = floatval($_GET['precoMin']);
        } else {
            $precoMin = 0;
        }

        if ($_GET['precoMax'] != null) {
            $precoMax = floatval($_GET['precoMax']);
        } else {
            $precoMax = 0;
        }


        if (isset($_GET['paginaAtual'])) {
            $paginaAtual = intval($_GET['paginaAtual']);
            if ($paginaAtual == 0) {
                $paginaAtual = 1;
            }
        }



        $pesquisar = new Produto();

        $money = new money_format();

        $resultado = $pesquisar->getProdutos($txt, $frete, $condicaoProduto, $precoMin, $precoMax, $filtro, $filtroPreco, $paginaAtual);

        $countProdutosBD = intval($_SESSION['quantidadeProdutosPesquisa']);

        //var_dump($resultado);
    }
    ?>

    <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
    <script src="JQuery 3.6.0/jquery.zoom.min.js"></script>
    <script src="ActionsJS/imgZoom.js"></script>

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

    <!--Coluna 1-->
    <div class="container-fluid m-0 px-0 text-center pt-0">
        <div class="row gx-0">
            <div class="col-lg-3 pe-lg-0">
                <div class="container-fluid container-search p-0 m-0 p-2 border border-2">
                    <p class="text-start">Filtros:</p>
                    <form class="mb-2" method="POST" action="ActionPHP/pesquisarPub.php">
                        <div class="row">

                            <div class="col-sm-12 col-md-8 col-lg-9 pe-md-0 pe-lg-0">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-2 btn-pesquisa-submit" id="txtPesquisa" name="txtPesquisa" placeholder="Pesquisa" value="<?php echo ($txt); ?>">
                                    <label for="txtPesquisa">Pesquisa</label>
                                </div>
                            </div>

                            <div class="col-sm-12 col-md-4 col-lg-3 mb-3 ps-md-0 ps-lg-0">
                                <button type="submit" class="btn btn-paginaPesquisa-svg text-center rounded-0 w-100 h-100">
                                    <img class="svg svg-btn" src="UIcons/svg/fi-rs-search.svg" title="">
                                </button>
                            </div>


                        </div>

                        <div class="row justify-content-center align-items-center pt-3">
                            <div class="col-12">
                                <button class="btn btn-pub rounded-0 w-100 border border-1" style="max-height:50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescricao" aria-expanded="false" aria-controls="collapseDescricao">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="container-fluid my-auto p-0">
                                                <p class="text-start align-self-center m-auto fs-5 h-100 w-100">Departamentos</p>
                                            </div>
                                        </div>

                                        <div class="expand col-2 d-flex justify-content-end">
                                            <img class="svg expand-more svg-btn" src="img/btns/expand.svg"></img>
                                        </div>
                                    </div>
                                </button>
                            </div>
                        </div>

                        <div class="collapse mt-0 mb-0" id="collapseDescricao">
                            <div class="container-fluid container-search text-blue p-2 m-0">
                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Eletrodomésticos</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Áudio</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Brinquedos</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Móveis</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Serviços</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Games</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Informática</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Esporte</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Livros</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Roupas</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Acessórios</label>
                                </div>

                                <div class="form-check form-switch mb-3">
                                    <input class="form-check-input" type="radio" name="filtro" id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Alimentos</label>
                                </div>
                            </div>

                        </div>



                        <hr class="mx-1" />
                        <div class="container-fluid p-0 px-3 m-0 justify-content-center align-items-center">

                            <div class="form-check form-switch">
                                <input class="form-check-input" <?php if ($frete == 1) {
                                                                    echo ("checked");
                                                                } ?> type="checkbox" id="checkFrete" name="checkFrete">
                                <label class="form-check-label text-blue  fw-bold" for="checkFrete">Frete grátis</label>
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid p-0 m-0">
                            <div class="row gx-0">
                                <div class="col-12">
                                    <input type="radio" class="btn-check rounded-0 w-100 me-0" name="optPublicacao" id="optProduto" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;" autocomplete="off" checked>
                                    <label class="btn btn-outline-light rounded-0 btn-radio-blue w-100 me-0" for="optProduto" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;">Produto</label>
                                </div>
                                <!--
                                <div class="col-6">
                                    <input type="radio" class="btn-check rounded-0 w-100 ms-0" name="optPublicacao" id="optServico" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;" autocomplete="off">
                                    <label class="btn btn-outline-light rounded-0 btn-radio-blue w-100 ms-0" for="optServico" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;">Serviço</label>
                                </div>
                                -->
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid p-0 m-0">
                            <div class="row gx-0">
                                <div class="col-6">
                                    <input type="radio" class="btn-check rounded-0 w-100 me-0" <?php if ($condicaoProduto == 1) {
                                                                                                    echo ("checked");
                                                                                                } ?> name="radioCondicao" id="btnNovo" value="1" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;" autocomplete="off">
                                    <label class="btn btn-outline-light rounded-0 btn-radio-blue w-100 me-0" for="btnNovo" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;">Novo</label>
                                </div>

                                <div class="col-6">
                                    <input type="radio" class="btn-check rounded-0 w-100 ms-0" <?php if ($condicaoProduto == 0) {
                                                                                                    echo ("checked");
                                                                                                } ?> name="radioCondicao" id="btnUsado" value="0" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;" autocomplete="off">
                                    <label class="btn btn-outline-light rounded-0 btn-radio-blue w-100 ms-0" for="btnUsado" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;">Usado</label>
                                </div>
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid p-0 px-3 m-0">
                            <div class="form-floating rounded-0">
                                <select class="form-select border border-1 rounded-0" id="selectFiltrar" name="selectFiltrar" aria-label="Filtrar por">
                                    <option value="3" <?php if ($filtro == 3) {
                                                            echo ("selected");
                                                        } ?>>Melhor avaliados</option>
                                    <option value="4" <?php if ($filtro == 4) {
                                                            echo ("selected");
                                                        } ?>>Mais novos</option>
                                    <option value="5" <?php if ($filtro == 5) {
                                                            echo ("selected");
                                                        } ?>>Mais velhos</option>
                                </select>
                                <label class="form-label" for="selectFiltrar">Filtrar por</label>
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid">
                            <div class="row justify-content-center align-items-center pt-3">
                                <div class="col-12">
                                    <button class="btn btn-pub rounded-0 w-100 border border-1" style="max-height:50px;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePreco" aria-expanded="false" aria-controls="collapsePreco">
                                        <div class="row">
                                            <div class="col-10">
                                                <div class="container-fluid my-auto p-0">
                                                    <p class="text-start align-self-center m-auto fs-5 h-100 w-100">Preço</p>
                                                </div>
                                            </div>

                                            <div class="expand col-2 d-flex justify-content-end">
                                                <img class="svg expand-more svg-btn" src="img/btns/expand.svg"></img>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>

                            <div class="collapse mt-0 mb-0" id="collapsePreco">
                                <div class="container-fluid container-search p-2 m-0">
                                    <div class="form-floating rounded-0 pb-3">
                                        <select class="form-select border border-1 rounded-0" id="selectFiltrarPreco" name="selectFiltrarPreco" aria-label="Filtrar por">
                                            <option value="1" <?php if ($filtroPreco == 1) {
                                                                    echo ("selected");
                                                                } ?>>Preço decrescente</option>
                                            <option value="2" <?php if ($filtroPreco == 2) {
                                                                    echo ("selected");
                                                                } ?>>Preço crescente</option>
                                        </select>
                                        <label class="form-label" for="selectFiltrarPreco">Filtrar por</label>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control rounded-2" id="precoMin" name="precoMin" placeholder="Preço Mínimo" value="<?php echo ($precoMin); ?>">
                                                <label for="precoMin">Preço Mínimo</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-floating">
                                                <input type="number" class="form-control rounded-2" id="precoMax" name="precoMax" placeholder="Preço Máximo" value="<?php echo ($precoMax); ?>">
                                                <label for="precoMax">Preço Máximo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <input name="paginaAtual" hidden value="<?php echo ($paginaAtual); ?>">

                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <!--Coluna 2-->
            <div class="col-lg-9 h-auto">
                <div class="container-fluid h-100 container-resultado p-0 m-0 p-1">
                    <div class="row mx-sm-auto mx-md-auto gx-0">
                        <?php

                        if ($resultado != false) {
                            $contador = count($resultado);
                        } else {
                            $contador = 0;
                        }


                        if ($resultado != false) {



                            //var_dump($contador);


                            foreach ($resultado as $produto) {
                                $idProduto = $produto['idProduto'];
                                $idAutor = $produto['idAutor'];
                                $titulo = $produto['titulo'];
                                $preco = floatval($produto['preco']);
                                $img = $produto['imagens'];
                                $img = explode(" ", $img);
                                $destinoImg = "";
                                if ($img[0] != "") {
                                    $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                                } else {
                                    $destinoImg = "img/imgPadraoProduto.png";
                                }



                                if ($preco >= $precoMin && $preco <= $precoMax || $precoMax <= 0) {
                        ?>
                                    <div class="col-sm-12 col-md-12 col-lg-6 pt-2 mx-sm-auto mx-md-auto">
                                        <a href="produto.php?id=<?php echo ($idProduto) ?>" title="<?php echo ($titulo) ?>">
                                            <div class="card card-resultado card-resultadoPesquisa mx-sm-auto mx-md-auto mx-lg-3 mb-1">
                                                <img src="<?php echo ($destinoImg); ?>" class="card-img-top" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title card-resultado text-start text-blue"><?php if (strlen($titulo) > 12) {
                                                                                                            $tituloArray = str_split($titulo);
                                                                                                            for ($i = 0; $i < strlen($titulo); $i++) {
                                                                                                                echo ($tituloArray[$i]);
                                                                                                            }
                                                                                                        } else {
                                                                                                            echo ($titulo);
                                                                                                        } ?></h5>
                                                    <p class="card-text card-resultado text-success text-start"><?php echo ($money->money_format("%.2n", $preco)); ?></p>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <div class="row h-100">

                                <div class="col-12">
                                    <div class="container-fluid p-0 pt-2 px-3 m-0 h-100">
                                        <p class="display-5 fw-bolder text-center">Nada encontrado</p>
                                    </div>
                                </div>

                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                $parametros = $_SERVER['QUERY_STRING'];

                $UrlAtual = '?' . $parametros;

                //echo $UrlAtual;
                ?>
                <div class="container-fluid container-pagina p-0 m-0">
                    <nav aria-label="Página">
                        <ul class="pagination pagination-lg pt-3 justify-content-center">
                            <?php
                            $condicaoAnterior = ($paginaAtual - 1) <= 0;
                            $condicaoProximo = $countProdutosBD - ($paginaAtual * 10);
                            if ($condicaoProximo > 0) {
                                $condicaoProximo = false;
                            }


                            $condicaoBlock = ($paginaAtual * 10) > $countProdutosBD;

                            //var_dump($condicaoProximo);


                            if (str_contains($UrlAtual, "paginaAtual=")) {
                                $posicao = strpos($UrlAtual, "paginaAtual=");
                                //$UrlAtual = substr($UrlAtual, 0, $posicao + 12);
                                //$posicao = substr($UrlAtual, $posicao, $posicao + 12);
                                if ($paginaAtual <= 0) {
                                    $paginaAnterior = 0;
                                } else {
                                    $paginaAnterior = $paginaAtual - 1;
                                }

                                if ($paginaAnterior <= 0) {
                                    $UrlPagAnterior = "pesquisa.php" . substr($UrlAtual, 0, $posicao) . "paginaAtual=0";
                                } else {
                                    $UrlPagAnterior = "pesquisa.php" . substr($UrlAtual, 0, $posicao) . str_replace($UrlAtual, "paginaAtual=", "paginaAtual=$paginaAnterior");
                                }

                                $proxPagina = $paginaAtual + 1;

                                $urlProxPagina = "pesquisa.php" . substr($UrlAtual, 0, $posicao) . str_replace($UrlAtual, "paginaAtual=", "paginaAtual=$proxPagina");
                            } else {
                                $paginaAnterior = $paginaAtual - 1;
                                $UrlPagAnterior = "pesquisa.php" . $UrlAtual . "&paginaAtual=$paginaAnterior";
                                $proxPagina = $paginaAtual + 1;
                                $urlProxPagina = "pesquisa.php" . $UrlAtual . "&paginaAtual=$proxPagina";
                            }
                            ?>


                            <li class="page-item <?php if ($condicaoAnterior == true) {
                                                        echo ("disabled");
                                                    } ?>"><a class="page-link" <?php if ($condicaoAnterior == true) {
                                                                                    echo ("tabindex='-1' aria-disabled='true'");
                                                                                } ?> href="<?php echo ($UrlPagAnterior); ?>"><?php if ($condicaoAnterior == true) {
                                                                                                                                                                                        echo ("...");
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo ($paginaAtual - 1);
                                                                                                                                                                                    } ?> </a></li>
                            <li class="page-item active"><a class="page-link" href="pesquisa.php<?php echo ($UrlAtual); ?>"><?php echo ($paginaAtual); ?></a></li>
                            <li class="page-item <?php if ($condicaoProximo == true) {
                                                        echo ("disabled");
                                                    } ?>"><a class="page-link" <?php if ($condicaoProximo == true) {
                                                                                    echo ("tabindex='-1' aria-disabled='true'");
                                                                                } ?> href="<?php echo ($urlProxPagina); ?>"><?php if ($condicaoProximo == true) {
                                                                                                                                                                                    echo ("...");
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo ($paginaAtual + 1);
                                                                                                                                                                                } ?></a></li>

                        </ul>
                    </nav>
                </div>
            </div>





        </div>
    </div>



</body>

</html>