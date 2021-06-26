<?php
if (PHP_SESSION_DISABLED) {
    session_start();
}



/*
if (isset($_SESSION['senhaDiferente'])) {
    if ($_SESSION['senhaDiferente'] == true) {



?>
        <div class="modal show fade in" id="modalSenha" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-white bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ERRO</h5>
                    </div>
                    <div class="modal-body">
                        Senhas diferentes, digite a senha corretamente!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="ActionsJS/modalAction.js"></script>
<?php
        $_SESSION['senhaDiferente'] = false;
        session_destroy();
    }
}*/
?>

<body background="img/blockChaintr.gif" class="animated-gif"></body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="wrapper fadeInLeft">
                <div id="formContent">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="container-fluid bg-blue">
                                <h2 class="text-center p-2 my-auto text-white">Registro</h2>
                            </div>
                        </div>
                    </div>
                    <form class="m-3" method="POST" action="ActionPHP/registrar.php">
                        <?php
                        if (isset($_SESSION['erro'][12])) {
                        ?>

                            <div class="row p-0 mb-2">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading text-center mb-0 pt-0 mt-0">Email ou celular já cadastrados!</h4>
                                </div>
                            </div>

                        <?php
                        }
                        ?>


                        <div class="row">
                            <div class="col-6 form-floating fadeIn first mb-2">

                                <input type="text" class="form-control" id="nome" name="nomeP" placeholder="Nome">
                                <label class="form-label ms-2" for="nome" id="nomeLabel">Nome</label>
                            </div>

                            <div class="col-6 form-floating fadeIn first mb-2">
                                <input type="text" class="form-control" id="sobrenome" name="nomeS" placeholder="Sobrenome">
                                <label class="form-label ms-2" for="sobrenome" id="sobrenomeLabel">Sobrenome</label>
                            </div>
                            <?php
                            if (isset($_SESSION['erro'][0])) {


                            ?>
                                <script src="ActionsJS/registroNomeAction.js"></script>

                            <?php
                            }
                            ?>
                        </div>

                        <div class="row">
                            <div class="col-6 form-floating mb-2 fadeIn third">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                <label class="form-label ms-2" for="email" id="emailLabel">E-mail</label>
                            </div>

                            <div class="col-6 form-floating fadeIn third">
                                <input type="tel" class="form-control" id="celular" name="celular" placeholder="Celular" data-mask="00 00000-0000">
                                <label class="form-label ms-2" for="celular" id="celularLabel">Digite seu número de celular(Com DDD)</label>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['erro'][1])) {


                        ?>
                            <script src="ActionsJS/registroEmailAction.js"></script>

                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['erro'][9])) {


                        ?>
                            <script src="ActionsJS/registroCelularAction.js"></script>

                        <?php
                        }
                        ?>


                        <div class="row">
                            <div class="col-6 form-floating mb-2 fadeIn second">
                                <input type="password" class="form-control" id="senha" name="senhaP" placeholder="Senha">
                                <label class="form-label ms-2" for="senha" id="senhaLabel">Senha</label>
                            </div>

                            <div class="col-6 form-floating fadeIn second">
                                <input type="password" class="form-control" id="verificarSenha" name="senhaR" placeholder="Senha">
                                <label class="form-label ms-2" for="verificarSenha" id="verificarSenhaLabel">Repita a Senha</label>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['erro'][2])) {


                        ?>
                            <script src="ActionsJS/registroSenhaCharAction.js"></script>

                        <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['erro'][3])) {


                        ?>
                            <script src="ActionsJS/registroSenhaDiferenteAction.js"></script>

                        <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-8 form-floating mb-2 fadeIn second">
                                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço">
                                <label class="form-label ms-2" for="endereco" id="enderecoLabel">Endereço</label>
                            </div>

                            <?php
                            if (isset($_SESSION['erro'][4])) {


                            ?>
                                <script src="ActionsJS/registroEnderecoAction.js"></script>

                            <?php
                            }
                            ?>

                            <div class="col-4 form-floating mb-1 fadeIn second">
                                <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" maxlength="9" data-mask="00000-000">
                                <label class="form-label ms-2" for="cep" id="cepLabel">CEP</label>
                            </div>



                            <?php
                            if (isset($_SESSION['erro'][5])) {


                            ?>
                                <script src="ActionsJS/registroCepPreenAction.js"></script>

                            <?php
                            }
                            ?>

                            <?php

                            if (isset($_SESSION['erro'][6])) {


                            ?>
                                <script src="ActionsJS/registroCepInvalidoAction.js"></script>

                            <?php
                            }
                            ?>

                            <div class="col-4 form-floating fadeIn second">
                                <input type="text" class="form-control" id="numero" name="numero" placeholder="Número" maxlength="3">
                                <label class="form-label ms-2" for="numero" id="numeroLabel">Número</label>
                            </div>

                            <?php

                            if (isset($_SESSION['erro'][7])) {


                            ?>
                                <script src="ActionsJS/registroNumeroPreenAction.js"></script>

                            <?php
                            }
                            ?>

                            <div class="col-4 form-floating fadeIn second">
                                <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade">
                                <label class="form-label ms-2" for="cidade" id="cidadeLabel">Cidade</label>
                            </div>

                            <?php

                            if (isset($_SESSION['erro'][8])) {


                            ?>
                                <script src="ActionsJS/registroCidadePreenAction.js"></script>

                            <?php
                            }
                            ?>

                            <div class="col-4 form-floating fadeIn second mb-3">
                                <select class="form-select" name="estado" id="estado">
                                    <option disabled value="AC">Acre</option>
                                    <option disabled value="AL">Alagoas</option>
                                    <option disabled value="AP">Amapá</option>
                                    <option disabled value="AM">Amazonas</option>
                                    <option disabled value="BA">Bahia</option>
                                    <option disabled value="CE">Ceará</option>
                                    <option disabled value="DF">Distrito Federal</option>
                                    <option disabled value="ES">Espírito Santo</option>
                                    <option disabled value="GO">Goiás</option>
                                    <option disabled value="MA">Maranhão</option>
                                    <option disabled value="MT">Mato Grosso</option>
                                    <option disabled value="MS">Mato Grosso do Sul</option>
                                    <option disabled value="MG">Minas Gerais</option>
                                    <option disabled value="PA">Pará</option>
                                    <option disabled value="PB">Paraíba</option>
                                    <option disabled value="PR">Paraná</option>
                                    <option disabled value="PE">Pernambuco</option>
                                    <option disabled value="PI">Piauí</option>
                                    <option disabled value="RJ">Rio de Janeiro</option>
                                    <option disabled value="RN">Rio Grande do Norte</option>
                                    <option disabled value="RS">Rio Grande do Sul</option>
                                    <option disabled value="RO">Rondônia</option>
                                    <option disabled value="RR">Roraima</option>
                                    <option disabled value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option disabled value="SE">Sergipe</option>
                                    <option disabled value="TO">Tocantins</option>
                                </select>
                                <label class="form-label ms-2" for="estado" id="estadoLabel">Selecione seu Estado</label>
                            </div>
                        </div>




                        <div id="formFooter" class="mb-3">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn text-white btn-registro w-100">Registrar</button>
                                </div>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="wrapper fadeInRight">

                <div id="formContent">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="container-fluid bg-blue">
                                <h2 class="text-center text-white p-2">Login</h2>
                            </div>
                        </div>
                    </div>
                    <form class="m-3" method="POST" action="ActionPHP/login.php">
                        <?php
                        if (isset($_SESSION['erro'][13])) {
                        ?>

                            <div class="row p-0 mb-2">
                                <div class="alert alert-danger" role="alert">
                                    <h4 class="alert-heading text-center mb-0 pt-0 mt-0">Email ou celular não cadastrados!</h4>
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="row">
                            <div class="col-12 form-floating fadeIn first mb-2">
                                <input type="text" class="form-control" id="emailCelular" name="emailCelular" placeholder="Email ou número de celular">
                                <label class="form-label ms-2" for="emailCelular" id="emailCelularLabel">Digite seu email ou número de celular</label>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['erro'][10])) {


                        ?>

                            <script src="ActionsJS/loginEmailCelularPreen.js"></script>

                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-12 form-floating fadeIn second mb-3">
                                <input type="password" class="form-control" id="senhaLogin" name="senhaLogin" placeholder="Digite sua senha">
                                <label class="form-label ms-2" for="senhaLogin" id="senhaLoginLabel">Digite sua senha</label>
                            </div>
                        </div>

                        <?php
                        if (isset($_SESSION['erro'][11])) {


                        ?>

                            <script src="ActionsJS/loginSenhaPreen.js"></script>

                        <?php
                        }
                        ?>

                        <button type="submit" class="btn mb-3 text-white btn-registro w-100">Login</button>

                        <div id="formFooter">
                            <div class="col-12">
                                <a class="underlineHover mt-2 passHelp" id="passHelp" href="">Esqueceu a senha?</a>
                            </div>
                        </div>

                        <?php
                        if ($_GET) {
                            if ($_GET['error'] > 0) {
                                session_destroy();
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>