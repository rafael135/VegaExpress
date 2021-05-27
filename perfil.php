<?php

    require __DIR__.'/vendor/autoload.php';
    require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
    session_start();
    $detect = new Mobile_Detect();


    if($detect->isMobile() == true && !$detect->isTablet()){
        //  Inclui a navbar mobile na página
        include __DIR__ . '/includesPag/navbarSideBar.php';
    }else{
        // Inclui a navbar para Desktop na página
        include __DIR__.'/includesPag/navbar.php';
    }
    ?>
        <head>
            <link rel="stylesheet" href="includes/perfil.css">
        </head>
    <?php

    // Inclui a página Sobre Nós
    include __DIR__ . '/includesPag/perfilU.php';

    //  Inclui o final da página
    include __DIR__.'/includesPag/footer.php';
?>