<div class="container-fluid p-0 m-0 w-100">
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
            $pedidos = new Pedido(0);
            $pedidos = $pedidos->getPedidoUsrId($idUsr);

            //$publicacoes = new Produto();
            $obDb = new Database("produtos");
            $resultado = $publicacoes->getProdutoAutorId($idAutor);
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


            //var_dump($paginaAnt);
            //var_dump($proxPagina);



           

            //var_dump($resultado);
            
            if ($pedidos != false) {
                foreach ($pedidos as $pedido) {
                    $titulo = $pedido['tituloProduto'];
                    $preco = $pedido['precoProduto'];
                    $idProduto = $pedido['idProduto'];
                    $dataPublicacao = $pedido['dataPublicacao'];

                    $resultado = $obDb->select("idUsuario = $idUsr", null, "$paginaAnt, $proxPagina");

                    if($resultado != false){
                        foreach($resultado as $produto){
                            
                            $imgs = $produto['imagens'];
                            $idAutor = $produto['idAutor'];
                            $img = explode(" ", $imgs);
                            if ($img[0] != "") {
                                $destinoImg = "UsrImg/$idAutor/Produtos/$idProduto/" . $img[0];
                            } else {
                                $destinoImg = "img/imgPadraoProduto.png";
                            }
                        }
                    }


                    
                    



                    //var_dump($countProdutosBD);

                    
                }
            }
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
                        <?php  ?>
                    </h4>
                    <?php setlocale(LC_MONETARY, 'pt_BR.UTF8');
                    $money = new money_format();
                    ?>
                    <p class="card-text card-text-usuario"><?php echo ($money->money_format("%.2n", $preco)) ?></p>
                </div>
            </div>
        </div>
    </div>