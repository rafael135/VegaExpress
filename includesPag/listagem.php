<?php
require_once("vendor/autoload.php");

use App\Produto;
use App\money_format;
?>
<div class="row m-3 mt-2">
    <div class="container-fluid rounded-0" style="background-color: rgb(235, 235, 235) !important;">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="container-fluid p-0 bg-blue rounded-0">
                                <p class="display-5 text-center text-white p-3">Ultimas publicações</p>
                            </div>
                        </div>
                    </div>

                    <div class="row p-3">

                        <?php

                        $produtos = new Produto();
                        $resultado = $produtos->getTodosProdutos();
                        $pag = 0;
                        $max;
                        if ($_GET) {
                            $pag = $_GET['pag'] + 1;
                            if ($_GET['pag'] == 1) {
                                $max = 12;
                            } else {
                                $max = ($_GET['pag'] * 6);
                            }
                        } else {
                            $max = 6;
                            $pag = 1;
                        }

                        $cont = 0;
                        foreach ($resultado as $i) {
                            if ($resultado != false) {
                                $cont++;
                                if ($cont <= $max) {
                                    $idProduto = $i['idProduto'];
                                    $titulo = $i['titulo'];
                                    $preco = $i['preco'];
                                    $imgs = $i['imagens'];
                                    $idAutor = $i['idAutor'];
                                    $img = explode(" ", $imgs);
                                    if ($img[0] != "") {
                                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                                    } else {
                                        $destinoImg = "img/imgPadraoProduto.png";
                                    }

                        ?>

                                    <div class="col-sm-4 col-md-3 col-lg-2 mx-auto">
                                        <a href="produto.php?id=<?php echo ($idProduto); ?>">
                                            <div class="card link text-white text-center mb-2 mx-0" style="height: 14rem !important; width: 14rem !important;">
                                                <img class="card-img-top" src="<?php echo ($destinoImg); ?>" alt="">
                                                <div class="card-body my-auto">
                                                    <h4 cklass="card-title"><?php echo ($titulo); ?></h4>
                                                    <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                                                    $money = new money_format();
                                                    ?>
                                                    <p class="card-text"><?php echo ($money->money_format("%.2n", $preco)) ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                        <?php
                                } else {
                                    break;
                                }
                            }
                        }
                        ?>
                    </div>
                    <div class="container-fluid p-0 m-0">
                        <div class="row mx-auto justify-content-center">
                            <div class="col-1">
                                <a class="expand-btn text-center w-100" href="index.php?pag=<?php echo ($pag); ?>"><span id="expand-icon" class="material-icons blue text-center d-flex justify-content-center" style="font-size: 64px;">expand_more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>