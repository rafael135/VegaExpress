<head>
    <link rel="stylesheet" href="includesPag/paginasPerfil/includes/seguranca.css">
</head>

<?php

if (isset($_SESSION['usuarioVerificado'])) {
    $verificado = $_SESSION['usuarioVerificado'];
    if ($verificado == "true") {
        $verificado = true;
    } else {
        $verificado = false;
    }
}
?>

<!-- Verificar conta -->
<div class="row d-flex justify-content-center mt-4 mx-auto col-3">
    <!-- Button trigger modal -->

    <div class="container px-0 pt-0 container-btnVerificar">
        <div class="row">
            <div class="col-12">
                <div class="container-fluid p-0 m-0">
                    <p class="fs-3 mb-0 text-center <?php if ($verificado == true) {
                                                        echo ("text-success");
                                                    } else {
                                                        echo ("text-danger");
                                                    } ?>">
                        <?php if ($verificado == true) {
                            echo ("Sua conta está verificada");
                        } else {
                            echo ("Conta não verificada!");
                        } ?>
                    </p>
                </div>
            </div>


            <div class="col-12">
                <?php if ($verificado == false) { ?>
                    <button type="button" class="btn btn-lg btn-mudarNome w-100 d-flex justify-content-center rounded-0" data-bs-toggle="modal" data-bs-target="#verificarContaModal">
                        Verificar conta
                    </button>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="verificarContaModal" tabindex="-1" aria-labelledby="verificarContaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verificarContaModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="ActionPHP/verificarEmail.php" class="p-0 m-0">
                    <div class="modal-body p-0 m-0">
                        <div class="form-floating" <?php if($_SESSION['emailEnviado'] == "visualizado"){ echo("hidden"); } ?>>
                            <input type="email" class="form-control mt-2" id="email" required aria-describedby="emailHelp" placeholder="Endereço de email" name="email">
                            <label for="email" class="form-label">Digite seu e-mail novamente</label>
                            <small id="emailHelp" class="form-text text-muted">Será enviado um pedido de confirmação ao seu email</small>
                        </div>

                        <div class="container-fluid p-0 m-0" <?php if($_SESSION['emailEnviado'] != "visualizado"){ echo("hidden"); } ?>>
                            <div class="row">
                                <p class="fs-2 fw-bold text-danger text-center h-100 w-100">Um e-mail já foi enviado!</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" <?php if($_SESSION['emailEnviado'] == "visualizado"){ echo("hidden"); } ?> class="btn btn-mudarNomeModal">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Trocar senha -->
<div class="row d-flex justify-content-center mt-4 mx-auto col-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#TrocarSenha">
        Trocar senha
    </button>

    <!-- Modal -->
    <div class="modal fade" id="TrocarSenha" tabindex="-1" aria-labelledby="TrocarSenhaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TrocarSenhaLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="TrocarSenha">Troque sua senha:</label>
                        <input type="password" class="form-control mt-2" id="TrocarSenha" placeholder="Digite sua nova senha">

                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-mudarNomeModal">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>