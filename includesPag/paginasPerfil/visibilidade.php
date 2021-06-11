<head>
    <link rel="stylesheet" href="node_modules/cropperjs/dist/cropper.min.css">
    <script type="module" src="node_modules/cropperjs/dist/cropper.min.js"></script>
</head>

<!-- Alterar nome -->
<div class="container">

    <div class="row">
        <div class="container-fluid p-0 m-0 fieldset-visibilidade p-3 pt-2 mb-3 mt-3">




            <div class="row mt-2 justify-content-center align-items-center">
                <div class="col-lg-6">
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="mudarNomePerfil">Nome atual</span>
                        <input type="text" class="form-control" value="<?php

                                                                        use App\Usuario;

                                                                        echo ($_SESSION['nomeUsuario']); ?>" name="nomeAtual" readonly aria-label="nomeAtual" aria-describedby="mudarNomePerfil">
                        <button type="button" class="btn btn-mudarNome" data-bs-toggle="modal" data-bs-target="#mudarNomeModal">Mudar nome</button>
                        <!-- Modal mudarNome -->
                        <div class="modal fade" id="mudarNomeModal" tabindex="-1" aria-labelledby="mudarNomeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="ActionPHP/editarPerfil.php" class="w-100 p-0 m-0" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mudarNomeModalLabel">Digite um novo nome</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-floating">

                                                <input type="text" class="form-control" required minlength="4" id="mudarNome" name="mudarNome" placeholder="Digite o novo nome">
                                                <label for="mudarNome">Digite o novo nome</label>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-mudarNomeModal">Salvar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <hr class="mx-2">

            <!-- Alterar foto de perfil -->
            <div class="row me-0 mt-1 justify-content-center align-items-center">

                <?php
                $destino = "UsrImg/" . $_SESSION['idUsuario'] . "/fotoPerfil/";
                $user = new Usuario();
                $imgPerfil = $user->getFotoPerfil($_SESSION['idUsuario']);
                $imgPerfil = $imgPerfil[0]['imgPerfil'];
                if ($imgPerfil == "0") {
                ?>
                    <img class="svg svg-imgUser m-0 p-0 border border-1 rounded rounded-2" src="img/imgPadraoUser.svg">
                <?php
                } else {
                    $destinoImg = $destino . $imgPerfil;
                ?>
                    <img class="svg-imgUser m-0 p-0 border border-1 rounded rounded-circle" src="<?php echo ($destinoImg); ?>">
                <?php
                }
                ?>
                <form action="ActionPHP/editarPerfil.php" class="w-100 p-0 m-0" method="POST" enctype="multipart/form-data">
                    <div class="row p-0 m-0 mt-3 justify-content-center align-items-center">
                        <div class="col-6">
                            <div class="container-fluid ctn-label p-0 m-0">
                                <p class="fs-5 fw-bold text-white text-center mb-0">Selecione uma nova imagem para o perfil</p>
                            </div>
                        </div>
                        <div class="col-12"></div>
                        <div class="col-6">
                            <input type="file" name="imgPerfil" class="form-control mt-0" required accept=".png, .jpg, .jpeg" id="mudarFoto">
                        </div>
                    </div>


            </div>


            <div class="col-12">

                <!-- Modal mudarNome -->
                <div class="modal fade" id="mudarFotoPerfil" tabindex="-1" aria-labelledby="mudarFotoPerfilLabel" aria-hidden="true">
                    <div id="modal-input" class="modal-dialog p-5 modal-dialog-centered modal-dialog-scrollable">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mudarFotoPerfilLabel">Escolha a melhor posição que captura sua cara</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--<input type="file" name="imgPerfil" class="form-control" required accept=".png, .jpg, .jpeg" id="mudarFoto">-->
                                <div class="img-container imagePreview">
                                    <div class="row align-items-center">
                                        <div class="row justify-content-center align-items-center">


                                            <div class="container container-img-max">
                                                <img id="imagePreview" class="imagePreview-img">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" id="coordX" name="coordX" hidden>
                                <input type="text" id="coordY" name="coordY" hidden>
                                <input type="text" id="coordWidth" name="coordWidth" hidden>
                                <input type="text" id="coordHeight" name="coordHeight" hidden>
                                <script src="ActionsJS/inputImagensPreview.js"></script>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancelarModal" id="closeModal" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-mudarNomeModal">Salvar</button>
                            </div>
                        </div>


                    </div>
                </div>
                <script type="module" src="ActionsJS/inputImagensPreviewCropper.js"></script>

            </div>
            </form>

            <script src="ActionsJS/editImagePreview.js"></script>





        </div>



    </div>
</div>
</div>