<?php

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
session_start();
$detect = new Mobile_Detect();


if ($detect->isMobile() == true && !$detect->isTablet()) {
    //  Inclui a navbar mobile na página
    include __DIR__ . '/includesPag/novoNavbar.php';
} else {
    // Inclui a navbar para Desktop na página
    include __DIR__ . '/includesPag/novoNavbar.php';
}

?>

<head>
    <link rel="stylesheet" href="includes/pesquisa.css">
    <link rel="stylesheet" href="includes/publicacao.css">
</head>

<body background="img/backgroundVega.jpg" class="animated-gif"></body>

<?php

// Inclui o formulário de pesquisa
//include __DIR__ . '/includesPag/pesquisa.php';

// Inclui a página Sobre Nós
include __DIR__ . '/includesPag/PesquisaResultado.php';

//  Inclui o final da página
include __DIR__ . '/includesPag/footer.php';
?>