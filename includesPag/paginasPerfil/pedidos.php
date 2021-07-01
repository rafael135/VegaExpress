<head>
    <link rel="stylesheet" href="includesPag/paginasPerfil/includes/pedidos.css">
</head>

<div class="container-fluid p-2 pb-3 m-0 w-100">
    <div class="row pt-2">
        <?php

        use App\Database;
        use App\Produto;
        use App\money_format;
        use App\Pedido;

        if (isset($_SESSION['idUsuario'])) {
            $paginaAtual = 1;
            if (isset($_GET['paginaAtual'])) {
                $paginaAtual = intval($_GET['paginaAtual']);
                if ($paginaAtual == 0) {
                    $paginaAtual = 1;
                }
            }

            $countProdutosBD = 0;
            $idUsr = $_SESSION['idUsuario'];
            //$pedidos = new Pedido(0);
            //$pedidos = $pedidos->getPedidoUsrId($idUsr);


            //$publicacoes = new Produto();
            //$obDb = new Database("produtos");
            //$resultado = $publicacoes->getProdutoAutorId($idAutor);
            $paginaAnt = 0;
            $proxPagina = 0;


            /*if (isset($_GET['titulo'])) {
                $titulo = $_GET['titulo'];
            }*/

            if ($paginaAtual == 0) {
                $paginaAnt = 0;
                $proxPagina = 10;
            } else {
                $paginaAnt = ($paginaAtual * 10) - 10;
                $proxPagina = 10;
            }


            //var_dump($paginaAnt);
            //var_dump($proxPagina);
            //var_dump($resultado);
            $obDb = new Database("pedidos");
            $resultado = $obDb->select("idUsuario = $idUsr", null, "$paginaAnt, $proxPagina");
            if ($resultado != false) {
                $countProdutosBD = count($resultado);
            }


            if ($resultado != false) {

                foreach ($resultado as $pedido) {

                    $titulo = $pedido['tituloProduto'];
                    $preco = $pedido['precoProduto'];
                    $idProduto = $pedido['idProduto'];
                    $dataPublicacao = $pedido['dataPublicacao'];
                    $dataFrete = $pedido['dataFrete'];
                    //$idAutor = $pedido['idUsuario'];
                    $endereco = $pedido['endereco'];
                    $numero = $pedido['numero'];
                    $cidade = $pedido['cidade'];
                    $estado = $pedido['estado'];
                    $cep = $pedido['cep'];





                    $product = new Produto();
                    $produto = $product->getProdutoId($idProduto);
                    $idAutor = $produto[0]['idAutor'];
                    //var_dump($produto);
                    
                    $imgs = $produto[0]['imagens'];
                    //var_dump($imgs);

                    $img = explode(" ", $imgs);
                    if ($img[0] != "" && $img[0] != null) {
                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                    } else {
                        $destinoImg = "img/imgPadraoProduto.png";
                    }


        ?>

                    <div class="col-sm-12 col-md-12 col-lg-6">

                        <?php
                        date_default_timezone_set("America/Sao_Paulo");
                        //$dataFrete = DateTime::createFromFormat("Y/m/d", $dataFrete);

                        //$DataFrete = new DateTime($dataFrete);

                        $data = new DateTime($dataFrete);
                        $dataPublicacao = new DateTime($dataPublicacao);

                        ?>
                        <div class="card card-usuario mb-lg-2 mt-sm-2 mt-md-2 mx-auto">
                            <img class="card-img img-pubUsr" src="<?php echo ($destinoImg); ?>" alt="">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-6">
                                        <h4 cklass="card-title card-title-usuario">
                                            <?php echo ($titulo); ?>
                                        </h4>
                                        <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                                        $money = new money_format();
                                        ?>
                                        <p class="card-text ms-2 mb-0 card-text-usuario"><?php echo ($money->money_format("%.2n", $preco)); ?></p>
                                        <p class="card-text ms-2 mt-1 mb-0 card-text-usuario"><?php echo ("Data da compra: " . date_format($dataPublicacao, "d-m-Y")); ?></p>
                                        <p class="card-text ms-2 mt-1 card-text-usuario"><?php echo ("Chegada estimada: " . date_format($data, "d-m-Y")); ?></p>
                                    </div>
                                    <div class="col-6">
                                        <h5 cklass="card-title card-title-usuario">
                                            Informações para entrega:
                                        </h5>
                                        <?php

                                        ?>


                                        <p title="<?php
                                                    if (strlen($endereco) > 15) {

                                                        echo ("Endereço: " . $endereco);
                                                    } else {
                                                        echo ("Endereço: " . $endereco);
                                                    }
                                                    ?>" class="card-text ms-2 mb-0 card-text-usuario"><?php if (strlen($endereco) > 15) {
                                                                                                            $end = str_split($endereco);
                                                                                                            echo ("Endereço: ");
                                                                                                            for ($i = 0; $i < 15; $i++) {
                                                                                                                echo ($end[$i]);
                                                                                                            }
                                                                                                            echo ("...");
                                                                                                        } else {
                                                                                                            echo ("Endereço: " . $endereco);
                                                                                                        }  ?></p>
                                        <p class="card-text ms-2 mt-1 mb-0 card-text-usuario"><?php echo ("Nº: " . $numero); ?></p>
                                        <p class="card-text ms-2 mt-1 mb-0 card-text-usuario"><?php echo ("Cidade: " . $cidade); ?></p>
                                        <p class="card-text ms-2 mt-1 mb-0 card-text-usuario"><?php echo ("Estado: " . $estado); ?></p>
                                        <p class="card-text ms-2 mt-1 mb-0 card-text-usuario"><?php echo ("CEP: " . $cep); ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                <?php




                }








                //var_dump($countProdutosBD);


            } else {
                ?>
                <div class="container-fluid p-0 m-0 w-100 h-100">
                    <p class="fw-bold m-4 text-blue display-6 text-center">Você não fez nenhuma compra</p>
                </div>

        <?php
            }
        }

        ?>
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
                    $UrlPagAnterior = "perfil.php?id=3" . "&paginaAtual=$paginaAnterior";
                    $proxPagina = $paginaAtual + 1;
                    $urlProxPagina = "perfil.php?id=3" . "&paginaAtual=$proxPagina";

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