var numero = document.getElementById("numero");
var numeroLabel = document.getElementById("numeroLabel");

numero.classList.add("loginError");
numero.classList.add("is-invalid");

numeroLabel.textContent = "Campo não preenchido!";
numeroLabel.style.color = "#d81919";

numero.addEventListener("click", function(){
    numeroLabel.textContent = "Número";
    numeroLabel.style.color = "black";
    numero.classList.remove("loginError");
});