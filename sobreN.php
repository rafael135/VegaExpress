<?php

    require __DIR__.'/vendor/autoload.php';
    require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
    session_start();
    $detect = new Mobile_Detect();


    if($detect->isMobile() == true && !$detect->isTablet()){
        //  Inclui a navbar mobile na página
        include __DIR__ . '/includesPag/navbar.php';
    }else{
        // Inclui a navbar para Desktop na página
        include __DIR__.'/includesPag/navbar.php';
    }
    ?>
    <body background="img/blockChaintr.gif" class="animated-gif"></body>
    <?php

    // Inclui a página Sobre Nós
    include __DIR__ . '/includesPag/sobre.php';

    //  Inclui o final da página
    include __DIR__ . '/includesPag/footer.php';
?>