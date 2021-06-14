<head>
    <link rel="stylesheet" href="includesPag/paginasPerfil/includes/seguranca.css">
</head>

<?php

$verificado = false;

if (isset($_SESSION['usuarioVerificado'])) {
    $verificado = $_SESSION['usuarioVerificado'];
    if ($verificado == "true") {
        $verificado = true;
    } else {
        $verificado = false;
    }
} else {
    $verificado = false;
}

$emailEnviado = "null";

if (isset($_SESSION['emailEnviado'])) {
    $emailEnviado = $emailEnviado;
}
?>

<!-- Verificar conta -->
<div class="row d-flex justify-content-center mt-4 mx-auto">
    <div class="container-fluid fieldset-visibilidade p-3 pt-2 mb-3 mt-3">


        <!-- Button trigger modal -->
        <div class="card w-100 <?php if ($verificado == true) {
                                    echo ("card-btnVerificar");
                                } else {
                                    echo ("cardbtnVerificarFalse");
                                } ?>">
            <div class="card-body">
                <?php if ($verificado == false) {
                ?>
                    <h5 class="card-title text-center text-white fs-1 fw-bold">Atenção!</h5>

                <?php } ?>
                <p class="card-text fs-3 mb-0 text-center <?php if ($verificado == true) {
                                                                echo ("text-success");
                                                            } else {
                                                                echo ("text-white");
                                                            } ?>">
                    <?php if ($verificado == true) {
                        echo ("Sua conta está verificada");
                    } else {
                        echo ("Sua conta não está verificada, clique no botão e verifique para ter acesso");
                    } ?>
                </p>

                <?php if ($verificado == false) { ?>
                    <button type="button" class="btn btn-lg btn-mudarNomeVerificar d-flex justify-content-center mx-auto col-4 text-center" data-bs-toggle="modal" data-bs-target="#verificarContaModal">
                        Verificar conta
                    </button>
                <?php } ?>


            </div>
        </div>

        <!--<div class="container px-0 pt-0 ">
        <div class="row">


            <div class="col-12">
                <div class="container-fluid p-0 m-0">

                </div>
            </div>


            <div class="col-12">

            </div>
        </div>
    </div>-->

        <!-- Modal -->
        <div class="modal fade" id="verificarContaModal" tabindex="-1" aria-labelledby="verificarContaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verificarContaModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="ActionPHP/verificarEmail.php" class="p-0 m-0">
                        <div class="modal-body p-2 m-0">
                            <div class="form-floating" <?php if ($emailEnviado == "visualizado") {
                                                            echo ("hidden");
                                                        } ?>>
                                <input type="email" class="form-control mt-2" id="email" required aria-describedby="emailHelp" placeholder="Endereço de email" name="email">
                                <label for="email" class="form-label">Digite seu e-mail novamente</label>
                                <small id="emailHelp" class="form-text text-muted">Será enviado um pedido de confirmação ao seu email</small>
                            </div>

                            <div class="container-fluid p-0 m-0" <?php if ($emailEnviado != "visualizado") {
                                                                        echo ("hidden");
                                                                    } ?>>
                                <div class="row">
                                    <p class="fs-2 fw-bold text-danger text-center h-100 w-100">Um e-mail já foi enviado!</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" <?php if ($emailEnviado == "visualizado") {
                                                        echo ("hidden");
                                                    } ?> class="btn btn-mudarNomeModal">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr class="mx-2">

        <!-- Trocar senha -->
        <div class="row d-flex justify-content-center mt-4 mx-auto col-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-mudarNome btn-lg d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#TrocarSenha">
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
                        <form method="POST" action="ActionPHP/mudarSenha.php" class="p-0 m-0">
                            <div class="modal-body">
                                <div class="form-floating">
                                    <!--<small id="passwordAnteriorHelp" class="form-text text-muted"></small>-->
                                    <input type="password" class="form-control mt-2" id="passwordAnterior" required minlength="8" aria-describedby="passwordAnteriorLabel" placeholder="Senha atual" name="passwordAnterior">
                                    <label for="passwordAnteriorLabel" class="form-label">Senha atual</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control mt-2" id="passwordTroca" minlength="8" required aria-describedby="passwordTrocaLabel" placeholder="Digite a nova senha" name="passwordTroca">
                                    <label for="passwordTroca" id="passwordTrocaLabel" class="form-label">Digite a nova senha</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control mt-2" id="passwordTrocaConfirmar" required aria-describedby="passwordTrocaConfirmarLabel" placeholder="Repita a senha atual" name="passwordTrocaConfirmar">
                                    <label for="passwordTrocaConfirmar" id="passwordTrocaConfirmarLabel" class="form-label">Repita a nova senha</label>
                                    <a><small id="passwordTrocaHelp" class="form-text text-muted text-warning">Esqueceu a senha?</small></a>
                                </div>

                                <script src="includesPag/paginasPerfil/includes/passwordIgual.js"></script>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-cancelarModal" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-mudarNomeModal">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





</div>