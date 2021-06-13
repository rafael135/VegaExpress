<?php

use App\Database;
use App\Usuario;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
session_start();
$detect = new Mobile_Detect();

$result = false;
if ($_GET) {
    if (isset($_SESSION['idUsuario'])) {

        $idUsr = $_SESSION['idUsuario'];
        if (isset($_GET['confirm'])) {
            $codURL = $_GET['confirm'];
            if (isset($_SESSION['codVerificacao'])) {
                $codR = $_SESSION['codVerificacao'];
                if ($codURL == $codR) {
                    $obDb = new Database("usuarios");
                    //$query = "UPDATE `usuarios` SET contaVerificada = 'true' WHERE id = $idUsr";
                    //$result = $obDb->executar($query);

                    $result = $obDb->atualizar("id = $idUsr", [
                        'contaVerificada' => "true"
                    ]);

                    if ($result != false) {
                        //unset($_SESSION['codVerificacao']);
                    }
                }
            }
        }
    } else {
    }
}





if ($detect->isMobile() == true && !$detect->isTablet()) {
    //  Inclui a navbar mobile na página
    include __DIR__ . '/includesPag/navbarSideBar.php';
} else {
    // Inclui a navbar para Desktop na página
    include __DIR__ . '/includesPag/navbar.php';
}
?>

<head>
    <link rel="stylesheet" href="includes/perfil.css">
    <link rel="stylesheet" href="includesPag/paginasPerfil/includes/configs.css">
</head>
<?php

// Inclui a página Sobre Nós
include __DIR__ . '/includesPag/perfilU.php';

if ($result != false) {
?>

    <head>
        <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
    </head>

    <script>
        jQuery(document).ready(function() {
            /*  Replace all SVG images with inline SVG */
            $('img.svg').each(function() {
                var $img = $(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                $.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                });
            });
        });
    </script>
    <div class="toast-container position-absolute bottom-0 end-0 p-3">
        <div class="toast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/btns/done.svg" class="svg svg-success" alt="Sucesso!">
                <strong class="me-auto">Sucesso</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Conta verificada com sucesso!
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".toast").toast("show");
        });
    </script>


    <?php
}

if (isset($_SESSION['emailEnviado'])) {
    if ($_SESSION['emailEnviado'] != "visualizado") {
        unset($_SESSION['emailEnviado']);
        $_SESSION['emailEnviado'] = "visualizado";
    ?>

        <head>
            <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
        </head>

        <script>
            jQuery(document).ready(function() {
                /*  Replace all SVG images with inline SVG */
                $('img.svg').each(function() {
                    var $img = $(this);
                    var imgID = $img.attr('id');
                    var imgClass = $img.attr('class');
                    var imgURL = $img.attr('src');

                    $.get(imgURL, function(data) {
                        // Get the SVG tag, ignore the rest
                        var $svg = $(data).find('svg');
                        // Add replaced image's ID to the new SVG
                        if (typeof imgID !== 'undefined') {
                            $svg = $svg.attr('id', imgID);
                        }
                        // Add replaced image's classes to the new SVG
                        if (typeof imgClass !== 'undefined') {
                            $svg = $svg.attr('class', imgClass + ' replaced-svg');
                        }
                        // Remove any invalid XML tags as per http://validator.w3.org
                        $svg = $svg.removeAttr('xmlns:a');
                        // Replace image with new SVG
                        $img.replaceWith($svg);
                    });
                });
            });
        </script>
        <div class="toast-container position-absolute bottom-0 end-0 p-3">
            <div class="toast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="img/btns/done.svg" class="svg svg-warning" alt="Sucesso!">
                    <strong class="me-auto text-black-50">Sucesso</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    E-mail enviado, verifique sua caixa de entrada
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $(".toast").toast("show");
            });
        </script>
    <?php
    }
}
if (isset($_SESSION['senhaAlterada'])) {
    unset($_SESSION['senhaAlterada']);
    ?>

    <head>
        <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
    </head>

    <script>
        jQuery(document).ready(function() {
            /*  Replace all SVG images with inline SVG */
            $('img.svg').each(function() {
                var $img = $(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                $.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                });
            });
        });
    </script>
    <div class="toast-container position-absolute bottom-0 end-0 p-3">
        <div class="toast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/btns/done.svg" class="svg svg-success" alt="Sucesso!">
                <strong class="me-auto">Sucesso</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Senha alterada com sucesso!
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".toast").toast("show");
        });
    </script>
<?php

}

if (isset($_SESSION['senhaErrada'])) {
    unset($_SESSION['senhaErrada']);
?>

    <head>
        <script src="JQuery 3.6.0/jquery-3.6.0.min.js"></script>
    </head>

    <script>
        jQuery(document).ready(function() {
            /*  Replace all SVG images with inline SVG */
            $('img.svg').each(function() {
                var $img = $(this);
                var imgID = $img.attr('id');
                var imgClass = $img.attr('class');
                var imgURL = $img.attr('src');

                $.get(imgURL, function(data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');
                    // Add replaced image's ID to the new SVG
                    if (typeof imgID !== 'undefined') {
                        $svg = $svg.attr('id', imgID);
                    }
                    // Add replaced image's classes to the new SVG
                    if (typeof imgClass !== 'undefined') {
                        $svg = $svg.attr('class', imgClass + ' replaced-svg');
                    }
                    // Remove any invalid XML tags as per http://validator.w3.org
                    $svg = $svg.removeAttr('xmlns:a');
                    // Replace image with new SVG
                    $img.replaceWith($svg);
                });
            });
        });
    </script>
    <div class="toast-container position-absolute bottom-0 end-0 p-3">
        <div class="toast" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="img/btns/danger.svg" class="svg svg-warning" alt="Atenção!">
                <strong class="me-auto fw-bold ms-2">Atenção</strong>
                <button type="button" class="btn-close btn-close-custom" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-warning">
                A senha atual inserida está incorreta!
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".toast").toast("show");
        });
    </script>
<?php
}

//$result = false;

//  Inclui o final da página
include __DIR__ . '/includesPag/footer.php';
?>