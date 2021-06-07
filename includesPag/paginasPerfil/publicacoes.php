<?php

use App\Produto;
use App\money_format;
?>

<div class="container-fluid p-0 m-0">
    <div class="row p-3">
        <?php
        if (isset($_SESSION['idUsuario'])) {
            $idAutor = $_SESSION['idUsuario'];
            $publicacoes = new Produto();
            $resultado = $publicacoes->getProdutoAutorId($idAutor);
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
                    if ($img[0] != "") {
                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                    } else {
                        $destinoImg = "img/imgPadraoProduto.png";
                    }






        ?>


                    <div class="col-sm-6 col-md-4 col-lg-2">
                        <!--<a href="produto.php?id=<?php echo ($idProduto); ?>" title="Editar publicação">-->
                        <a href="editarPub.php?id=<?php echo ($idProduto); ?>" title="Editar publicação">
                            <div class="card link text-white text-center mb-2 mx-0" style="max-height: 12rem !important; max-width: 12rem !important;">
                                <img class="card-img" src="<?php echo ($destinoImg); ?>" alt="">
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
                                    <h4 cklass="card-title text-white"><?php echo ($titulo); ?></h4>
                                    <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                                    $money = new money_format();
                                    ?>
                                    <p class="card-text text-center text-white"><?php echo ($money->money_format("%.2n", $preco)) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>


        <?php
                }
            }
        }
        ?>