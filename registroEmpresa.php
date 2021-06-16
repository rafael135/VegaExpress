<head>
    <link rel="stylesheet" href="includes/login.css">
</head>

<?php
    // Carrega automaticamente as dependências
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

    //  Inclui os formulários de registro
    include __DIR__.'/includesPag/registrarEmp.php';

    //  Inclui o final da página
    include __DIR__.'/includesPag/footer.php';
?>