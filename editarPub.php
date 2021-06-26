<?php

use App\Produto;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
session_start();
$detect = new Mobile_Detect();

if ($_GET) {
    if (isset($_GET['id'])) {
        $produto = new Produto();
        $idPub = $_GET['id'];
        $publicacao = $produto->getProdutoId($idPub);
        $idProduto = $publicacao[0]['idProduto'];
        $idAutor = $publicacao[0]['idAutor'];
        $idUsuarioAtual = $_SESSION['idUsuario'];

        if ($idPub == $idProduto && $idUsuarioAtual == $idAutor) {
        } else {
            header("Location: perfil.php?id=2");
        }
    } else {
        header("Location: perfil.php?id=2");
    }
}




if ($detect->isMobile() == true && !$detect->isTablet()) {
    //  Inclui a navbar mobile na página
    include __DIR__ . '/includesPag/navbar.php';
} else {
    // Inclui a navbar para Desktop na página
    include __DIR__ . '/includesPag/navbar.php';
}


?>

<head>
    <link rel="stylesheet" href="includes/publicacao.css">
</head>
<body background="img/blockChaintr.gif" class="animated-gif"></body>
<?php


// Inclui o formulário de pesquisa
//include __DIR__ . '/includesPag/pesquisa.php';

// Inclui a página Sobre Nós
include __DIR__ . '/includesPag/visualizacaoEditarProduto.php';

//  Inclui o final da página
include __DIR__ . '/includesPag/footer.php';
?>