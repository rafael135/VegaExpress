<!DOCTYPE html>
<html lang="pt-br">

<body>

    <?php

use App\money_format;
use App\Produto;

if ($_GET) {
        $txt = $_GET['txtPesquisa'];
        $frete = $_GET['frete'];
        if ($frete == "1") {
            $frete = 1;
        } else {
            $frete = 0;
        }
        $condicaoProduto = $_GET['condicaoProduto'];
        if ($condicaoProduto == "novo") {
            $condicaoProduto = 1; // 1 - Simboliza que o produto é novo
        } else {
            $condicaoProduto = 0; // 0 - Simboliza que o produto é usado
        }

        $filtro = intval($_GET['filtro']);

        $pesquisar = new Produto();

        $money = new money_format();

        $resultado = $pesquisar->getProdutos($txt, $frete, $condicaoProduto, $filtro);

        //var_dump($resultado);
    }
    ?>

    <!--Coluna 1-->
    <div class="container-fluid m-0 p-0 mx-2 ms-0 text-center pt-0">
        <div class="row">
            <div class="col-lg-3">
                <div class="container-fluid container-search p-0 m-0 p-2 border border-2">
                    <p class="text-start">Filtros:</p>
                    <form class="mb-2" method="POST" action="ActionPHP/pesquisarPub.php">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control rounded-2" id="txtPesquisa" name="txtPesquisa" placeholder="Pesquisa" value="<?php echo ($txt); ?>">
                            <label for="txtPesquisa">Pesquisa</label>
                        </div>
                        <div class="container-fluid border-produto p-0 m-0 p-2">
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

                        <div class="container-fluid p-0 px-3 m-0 justify-content-center align-items-center">
                            <hr class="mx-1" />
                            <div class="form-check form-switch">
                                <input class="form-check-input" <?php if ($frete == 1) {
                                                                    echo ("checked");
                                                                } ?> type="checkbox" id="checkFrete" name="checkFrete">
                                <label class="form-check-label text-blue  fw-bold" for="checkFrete">Frete grátis</label>
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid w-100 p-0 m-0">
                            <div class="btn-group no-outline text-center d-flex px-3 rounded-0 h-100 justify-content-center align-items-center" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check no-outline" <?php if ($condicaoProduto == 1) {
                                                                                        echo ("checked");
                                                                                    } ?> name="radioCondicao" value="novo" id="btnNovo" autocomplete="off" checked>
                                <label class="btn btn-outline-primary no-outline" for="btnNovo">Novo</label>

                                <input type="radio" class="btn-check no-outline" <?php if ($condicaoProduto == 0) {
                                                                                        echo ("checked");
                                                                                    } ?> name="radioCondicao" value="usado" id="btnUsado" autocomplete="off">
                                <label class="btn btn-outline-primary no-outline" for="btnUsado">Usado</label>
                            </div>
                        </div>

                        <hr class="mx-1">

                        <div class="container-fluid p-0 px-3 m-0">
                            <div class="form-floating rounded-0">
                                <select class="form-select border border-1 rounded-0" id="selectFiltrar" name="selectFiltrar" aria-label="Filtrar por">
                                    <option value="1" <?php if($filtro == 1){ echo("selected"); } ?>>Preço decrescente</option>
                                    <option value="2" <?php if($filtro == 2){ echo("selected"); } ?>>Preço crescente</option>
                                    <option value="3" <?php if($filtro == 3){ echo("selected"); } ?>>Melhor avaliados</option>
                                    <option value="4" <?php if($filtro == 4){ echo("selected"); } ?>>Mais novos</option>
                                    <option value="5" <?php if($filtro == 5){ echo("selected"); } ?>>Mais velhos</option>
                                </select>
                                <label class="form-label" for="selectFiltrar">Filtrar por</label>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <!--Coluna 2-->
            <div class="col-lg-9 pt-3">
                <div class="row mx-auto">

                    <?php foreach($resultado as $produto) {
                        $idProduto = $produto['idProduto'];
                        $idAutor = $produto['idAutor'];
                        $titulo = $produto['titulo'];
                        $preco = $produto['preco'];
                        $img = $produto['imagens'];
                        $img = explode(" ", $img);
                        $destinoImg = "";
                        if ($img[0] != "") {
                            $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                        } else {
                            $destinoImg = "img/imgPadraoProduto.png";
                        }
                    ?>
                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <a href="produto.php?id=<?php echo($idProduto) ?>">
                                <div class="card mb-4" style="width: 12rem; height: 12rem;">
                                    <img src="<?php echo($destinoImg); ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo($titulo) ?></h5>
                                        <p class="card-text"><?php echo($money->money_format("%.2n", $preco)); ?></p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>





        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>

</body>

</html>