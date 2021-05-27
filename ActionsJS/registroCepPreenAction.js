var cep = document.getElementById("cep");
var cepLabel = document.getElementById("cepLabel");

cep.classList.add("loginError");
cep.classList.add("is-invalid");

cepLabel.textContent = "Campo não preenchido!";

cepLabel.style.color = "#d81919";

cep.onclick = function(){
    cepLabel.style.color = "black";
    cepLabel.textContent = "CEP";
    cep.classList.remove("loginError");
};
