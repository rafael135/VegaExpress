$(document).ready(function() {
    var txtPreco = document.getElementById("preco");
    $(txtPreco).mask('#.##0,00', {reverse: true});
});