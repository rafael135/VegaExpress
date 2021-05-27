<?php
//require_once __DIR__ . '/app/Detect/detectMobile.php';
require __DIR__ . '/vendor/autoload.php';
//require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
session_start();

$detect = new Mobile_Detect();





// Detecta se o dispositivo é mobile ou não
if ($detect->isMobile() == true && !$detect->isTablet()) {
    //  Inclui a navbar mobile na página
    include __DIR__ . '/includesPag/navbarSideBar.php';
} else {
    // Inclui a navbar para Desktop na página
    include __DIR__ . '/includesPag/navbar.php';
}

include __DIR__ . '/includesPag/carrinho.php';

//include __DIR__ . '/sidebarT.php';


//  Inclui o final da página
include __DIR__ . '/includesPag/footer.php';

?>