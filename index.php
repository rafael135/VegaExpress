<?php
//require_once __DIR__ . '/app/Detect/detectMobile.php';
require __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
session_start();

$detect = new Mobile_Detect();





// Detecta se o dispositivo é mobile ou não
if ($detect->isMobile() == true && !$detect->isTablet()) {
    //  Inclui a navbar mobile na página
    include __DIR__ . '/includesPag/navbar.php';
} else {
    // Inclui a navbar para Desktop na página
    include __DIR__ . '/includesPag/navbar.php';
}

//include __DIR__ . '/sidebarT.php';

// Inclui o carousel
//include __DIR__ . '/carousel.php';

?>
<body background="img/blockChaintr.gif" class="animated-gif"></body>

<?php


// Inclui a barra de pesquisa
include __DIR__ . '/includesPag/pesquisa.php';

//  Inclui a listagem de ofertas
include __DIR__ . '/includesPag/listagem.php';

if (isset($_SESSION['idUsuario']) == true && !isset($_SESSION['contToast'])) {
   $_SESSION['contToast'] = 0;
?>
<div class="container-fluid" id="toastLogin">
    <div class="toast-container fadeIn fadeInCenter position-absolute bottom-0 end-0 p-3">
        <!-- Then put toasts within -->
        <div class="toast showing" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header toast-white">
                <strong class="me-auto text-end text-blue">Bem vindo <?php echo ($_SESSION['nomeUsuario']); ?>!</strong>
                <button type="button" class="btn-close-custom" id="btnToastLogin" data-bs-dismiss="toast" aria-label="Close"><span class="material-icons">close</span></button>
            </div>
        </div>
    </div>
</div>
<?php
}
//  Inclui o final da página
include __DIR__ . '/includesPag/footer.php';


?>

<?php

if (isset($_SESSION['idUsuario']) == true) {
?>

    <script src="ActionsJS/toastTimer.js"></script>

<?php
}
?>