<?php

use App\Database;
use App\Produto;
use App\money_format;



?>

<head>
    <link rel="stylesheet" href="includesPag/paginasPerfil/includes/publicacoes.css">
</head>

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

<div class="container-fluid p-0 m-0 w-100">
    <div class="row pt-2">
        <?php
        if (isset($_SESSION['idUsuario'])) {
            $paginaAtual = 1;
            if (isset($_GET['paginaAtual'])) {
                $paginaAtual = intval($_GET['paginaAtual']);
                if ($paginaAtual == 0) {
                    $paginaAtual = 1;
                }
            }

            $countProdutosBD = 0;

            $idAutor = intval($_SESSION['idUsuario']);
            $publicacoes = new Produto();
            $obDb = new Database("produtos");
            //$resultado = $publicacoes->getProdutoAutorId($idAutor);
            $paginaAnt = 0;
            $proxPagina = 0;

            $titulo = "";
            if (isset($_GET['titulo'])) {
                $titulo = $_GET['titulo'];
            }

            if ($paginaAtual == 0) {
                $paginaAnt = 0;
                $proxPagina = 10;
            } else {
                $paginaAnt = ($paginaAtual * 10) - 10;
                $proxPagina = 10;
            }
            $countBool = $obDb->select("idAutor = $idAutor and titulo LIKE '%$titulo%'", null);
            if ($countBool != false) {
                $countProdutosBD = count($countBool);
            }


            //var_dump($paginaAnt);
            //var_dump($proxPagina);



            $resultado = $obDb->select("idAutor = $idAutor", null, "$paginaAnt, $proxPagina");

            //var_dump($resultado);
            if ($resultado != false) {
                foreach ($resultado as $publicacao) {
                    $titulo = $publicacao['titulo'];
                    $preco = $publicacao['preco'];
                    $idProduto = $publicacao['idProduto'];
                    $vendas = $publicacao['vendas'];
                    $dataPublicacao = $publicacao['dataPublicacao'];
                    $imgs = $publicacao['imagens'];
                    $idAutor = $publicacao['idAutor'];
                    $img = explode(" ", $imgs);




                    //var_dump($countProdutosBD);

                    if ($img[0] != "") {
                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                    } else {
                        $destinoImg = "img/imgPadraoProduto.png";
                    }






        ?>


                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <!--<a href="produto.php?id=<?php echo ($idProduto); ?>" title="Editar publicação">-->

                        <div class="card card-usuario mb-lg-2 mt-sm-2 mt-md-2 mx-auto">
                            <img class="card-img img-pubUsr" src="<?php echo ($destinoImg); ?>" alt="">
                            <!--<div class="card-img-overlay py-0">
                                                                    <div class="row px-lg-3">
                                                                        <div class="col-4 offset-8">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <a class="btn btn-clean btn-edit-pub m-0 p-0 text-white" href="editarPub.php?id=<?php echo ($idProduto); ?>"><span class="material-icons m-0 p-0 text-light">edit</span></a>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <a class="btn btn-clean btn-delete-pub m-0 p-0 text-white" href="ActionPHP/excluirPub.php?id=<?php echo ($idProduto); ?>"><span class="material-icons m-0 p-0 red">delete</span></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>-->
                            <div class="card-body">
                                <h4 cklass="card-title card-title-usuario">
                                    <?php if (strlen($titulo) > 12) {
                                        $tituloArray = str_split($titulo);
                                        for ($i = 0; $i < strlen($titulo); $i++) {
                                            echo ($tituloArray[$i]);
                                        }
                                    } else {
                                        echo ($titulo);
                                    } ?>
                                </h4>
                                <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                                $money = new money_format();
                                ?>
                                <p class="card-text card-text-usuario"><?php echo ($money->money_format("%.2n", $preco)) ?></p>

                                <button type="button" class="btn btn-svg-delete position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#deletarModal" title="Excluir publicação">
                                    <img class="svg svg-btn-delete" src="UIcons/svg/fi-rs-trash.svg">
                                </button>
                                <a href="editarPub.php?id=<?php echo ($idProduto); ?>" title="Editar publicação">
                                    <button type="button" class="btn btn-svg-edit position-absolute top-0 end-0 rounded-0 me-btn-edit">
                                        <img class="svg svg-btn-edit" src="UIcons/svg/fi-rs-edit.svg">
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="modal fade" id="deletarModal" tabindex="-1" aria-labelledby="deletarModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deletarModalLabel">Confirmação</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Tem certeza de que deseja excluir a publicação?
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <a href="ActionPHP/excluirPub.php?id=<?php echo ($idProduto); ?>" type="button" class="btn btn-success">Sim</a>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <div class="container-fluid p-0 m-0 w-100 h-100">
                    <p class="fw-bold display-6 text-center">Você não tem nenhuma publicação</p>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>

<div class="container-fluid">
    <nav aria-label="Página">
        <ul class="pagination pagination-lg justify-content-center">
            <?php
            $condicaoAnterior = ($paginaAtual - 1) <= 0;
            $condicaoProximo = $countProdutosBD - ($paginaAtual * 10);
            if ($condicaoProximo > 0) {
                $condicaoProximo = false;
            }



            $condicaoBlock = (($paginaAtual * 10) + 10) < $countProdutosBD;

            //var_dump($condicaoProximo);



            $paginaAnterior = $paginaAtual - 1;
            $UrlPagAnterior = "perfil.php?id=2" . "&paginaAtual=$paginaAnterior";
            $proxPagina = $paginaAtual + 1;
            $urlProxPagina = "perfil.php?id=2" . "&paginaAtual=$proxPagina";

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