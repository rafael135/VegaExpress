$(document).ready(function () {
    var modalPub = document.getElementById("produtoModal");
    var inputPreco = document.getElementById("preco");
    var inputPrecoLabel = document.getElementById("precoLabel");

    

    modalPub.addEventListener('show.bs.modal', function () {
        inputPreco.classList.add("is-invalid");
        inputPrecoLabel.textContent = "Preço inválido!";
        inputPreco.focus();
    })

    inputPreco.addEventListener('click', function () {
        inputPreco.classList.remove("is-invalid");
        inputPrecoLabel.textContent = "Preço";
    })

    $(modalPub).modal('show');
})