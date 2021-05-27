var nome = document.getElementById("nome");
var sobrenome = document.getElementById("sobrenome");

nome.classList.add("loginError");
sobrenome.classList.add("loginError");
nome.classList.add("is-invalid");
sobrenome.classList.add("is-invalid");

var nomeLabel = document.getElementById("nomeLabel");
var sobrenomeLabel = document.getElementById("sobrenomeLabel");

nomeLabel.textContent = "Nome não preenchido!";
sobrenomeLabel.textContent = "Sobrenome não preenchido!";

nomeLabel.style.color = "#d81919";
sobrenomeLabel.style.color = "#d81919";

nome.onclick = function () {
    nomeLabel.style.color = "black";
    nomeLabel.textContent = "Nome";
};
sobrenome.onclick = function () {
    sobrenomeLabel.style.color = "black";
    sobrenomeLabel.textContent = "Sobrenome";
    nome.classList.remove("loginError");
    sobrenome.classList.remove("loginError");
};