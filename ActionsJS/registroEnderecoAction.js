var endereco = document.getElementById("endereco");

endereco.classList.add("loginError");
endereco.classList.add("is-invalid");

var enderecoLabel = document.getElementById("enderecoLabel");

enderecoLabel.textContent = "Campo não preenchido!";

enderecoLabel.style.color = "#d81919";

endereco.onclick = function(){
    enderecoLabel.style.color = "black";
    enderecoLabel.textContent = "Endereço";
    endereco.classList.remove("loginError");
};
