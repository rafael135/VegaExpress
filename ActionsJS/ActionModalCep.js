var cep = document.getElementById("cep");

cep.addEventListener("keydown", function () {
    if (cep.textContent.length == 5) {
        cep.textContent.concat("-");
    }
});