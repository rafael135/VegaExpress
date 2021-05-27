<?php

use App\Produto;
use App\money_format;

$idPag;
if ($_GET) {
    if ($_GET['id']) {
        $idPag = $_GET['id'];
    } else {
        $idPag = 0;
    }
    //var_dump($idPag);
} else {
    $idPag = 0;
}
?>

<div class="row ps-4 pe-4 mt-3">
    <div class="col-12 m-0 p-0">
        <div class="container-fluid border m-0 p-0">
            <div class="row">
                <div class="col-3 me-0 pe-0" id="options">
                    <div class="container-fluid m-0 p-0">
                        <ul class="nav nav-pills flex-column pe-0">
                            <div class="row">

                                <div class="col-12">
                                    <li class="nav-item">
                                        <a class="nav-link btn-group w-100 <?php if ($idPag == 0) {
                                                                                echo ("activeOpt");
                                                                            } ?>" href="perfil.php?id=0">
                                            <div class="row">
                                                <div class="col-2">
                                                    <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                        <span class="material-icons blue text-center m-1">
                                                            visibility
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <button type="button" class="btn h-100 text-start w-100 btn-clean">
                                                        Visibilidade de perfil
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </div>

                                <div class="col-12">
                                    <li class="nav-item">
                                        <a class="nav-link btn-group w-100 <?php if ($idPag == 1) {
                                                                                echo ("activeOpt");
                                                                            } ?>" href="perfil.php?id=1">
                                            <div class="row">

                                                <div class="col-2">
                                                    <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                        <span class="material-icons blue text-center m-1">
                                                            lock
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <button type="button" class="btn h-100 text-start w-100 btn-clean">
                                                        Segurança
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </div>

                                <div class="col-9 pe-0">
                                    <li class="nav-item">

                                        <a class="nav-link btn-group w-100 <?php if ($idPag == 2) {
                                                                                echo ("activeOpt");
                                                                            } ?>" href="perfil.php?id=2">
                                            <div class="row">

                                                <div class="col-2">
                                                    <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                        <span class="material-icons blue text-center m-1">
                                                            view_list
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="col-10">
                                                    <button type="button" class="btn h-100 text-start w-100 btn-clean">
                                                        Minhas Publicações
                                                    </button>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </div>

                                <div class="col-3 ps-0">
                                    <a class="btnPub btn-group w-100 h-100" title="Publicar um produto" role="button" href="" data-bs-toggle="modal" data-bs-target="#produtoModal">
                                        <div class="row p-0 m-0">
                                            <div class="col-12">
                                                <button type="button" class="btn h-100 text-center w-100 btn-clean">
                                                    <span class="material-icons mx-2 my-1 blue text-center fs-1">
                                                        note_add
                                                    </span>
                                                </button>
                                            </div>

                                        </div>
                                    </a>

                                    <!-- Modal -->
                                    <div class="modal fade w-100" id="produtoModal" tabindex="-1" aria-labelledby="produtoModalLabel" aria-hidden="true">


                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="produtoModalLabel">Nova publicação</h5>
                                                    <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
                                                </div>
                                                <div class="modal-body">
                                                    <form class="m-3" method="POST" action="ActionPHP/novaPub.php" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-12 form-floating fadeIn first mb-2">
                                                                <input type="text" maxlength="65" class="form-control" id="titulo" name="titulo" placeholder="Título" required>
                                                                <label class="form-label ms-2" for="titulo" id="titulo">Título</label>
                                                            </div>

                                                            <div class="row me-0">
                                                                <div class="col-12 fadeIn first">
                                                                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="imagens" name="imagens[]" placeholder="Foto do produto" title="Imagens do produto" multiple>
                                                                </div>
                                                                <div class="col-12 mb-2 fadeIn first">
                                                                    <img id="img-0">
                                                                </div>

                                                                <script src="ActionsJS/inputImagensPreview.js"></script>
                                                            </div>

                                                            <div class="col-12 form-floating fadeIn first mb-2">
                                                                <textarea type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>
                                                                <label class="form-label ms-2" for="descricao" id="descricao">Descrição</label>
                                                            </div>

                                                            <div class="col-12 form-floating fadeIn first mb-2">
                                                                <input type="number" class="form-control h-100" id="preco" name="preco" placeholder="Preço" required>
                                                                <label class="form-label ms-2" for="preco" id="precoLabel">Preço</label>
                                                            </div>

                                                            <div class="col-12 form-floating fadeIn first mb-2">

                                                                <div class="row gx-0">
                                                                    <div class="col-6">
                                                                        <input type="radio" class="btn-check w-100 me-0" name="optPublicacao" id="optProduto" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;" autocomplete="off" checked>
                                                                        <label class="btn btn-outline-light btn-radio-blue w-100 me-0" for="optProduto" style="border-bottom-right-radius: 0 !important; border-top-right-radius: 0 !important;">Produto</label>
                                                                    </div>

                                                                    <div class="col-6">
                                                                        <input type="radio" class="btn-check w-100 ms-0" name="optPublicacao" id="optServico" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;" autocomplete="off">
                                                                        <label class="btn btn-outline-light btn-radio-blue w-100 ms-0" for="optServico" style="border-bottom-left-radius: 0 !important; border-top-left-radius: 0 !important;">Serviço</label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row gx-0 pe-3">
                                                                <div class="col-sm-8 col-md-8 col-lg-10"></div>

                                                                <div class="col-sm-4 col-md-4 col-lg-2 fadeIn second">
                                                                    <input type="submit" class="btn btn-success text-center w-100" value="Publicar">
                                                                </div>
                                                            </div>
                                                        </div>








                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['erro'][14])) {
                                        var_dump($_SESSION['erro'][14]);
                                    ?>

                                        <script src="ActionsJS/modalPrecoInvalido.js"></script>
                                    <?php
                                    } ?>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class="col-9 ms-0 ps-0" id="options-show">
                    <div class="container-fluid h-100 bg-light p-0">

                        <!-- Página de visibilidade -->
                        <?php

                        if ($idPag == 0) {


                        ?>
                            Página de visibilidade

                        <?php
                        }
                        ?>

                        <!-- Página de segurança -->
                        <?php
                        if ($idPag == 1) {


                        ?>

                            Página de segurança
                        <?php
                        }
                        ?>

                        <!-- Página de Publicações -->
                        <?php
                        if ($idPag == 2) {


                        ?>


                            <div class="container-fluid p-0 m-0">
                                <div class="row p-3">
                                    <?php if ($idPag == 2) {
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
                                                    if($img[0] != ""){
                                                        $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                                                    }else{
                                                        $destinoImg = "img/imgPadraoProduto.png";
                                                    }
                                                    
                                                    


                                                    

                                    ?>

                                                    <div class="col-sm-6 col-md-4 col-lg-2 mx-auto">
                                                        <a class="text-white" href="produto.php?id=<?php echo ($idProduto); ?>">
                                                            <div class="card link text-white text-center mb-2 mx-0">
                                                                <img class="card-img-top" src="<?php echo($destinoImg); ?>" alt="" style="max-height: 7rem !important;">
                                                                
                                                                <div class="card-body">
                                                                    <h4 cklass="card-title text-white"><?php echo ($titulo); ?></h4>
                                                                    <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                                                                    $money = new money_format();
                                                                    ?>
                                                                    <p class="card-text text-center text-white"><?php echo ($money->money_format("%.2n", $preco)) ?></p>
                                                                    
                                                                </div>
                                                                <a class="btn btn-clean btn-delete-pub m-0 p-0 text-white" href="ActionPHP/excluirPub.php?id=<?php echo($idProduto); ?>"><span class="material-icons m-0 p-0 red">delete</span></a>
                                                            </div>
                                                        </a>
                                                    </div>


                                    <?php
                                                }
                                            }
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                    </div>
                <?php
                        }
                ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if (isset($_SESSION['erro'][14])) {
    unset($_SESSION['erro'][14]);
}
?>