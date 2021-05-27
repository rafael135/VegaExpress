var emailCelular = document.getElementById("emailCelular");
var emailCelularLabel = document.getElementById("emailCelularLabel");

emailCelular.classList.add("loginError");
emailCelular.classList.add("is-invalid");

emailCelularLabel.textContent = "Campo obrigatório!";

emailCelularLabel.style.color = "#d81919";

emailCelular.onclick = function(){
    emailCelularLabel.style.color = "black";
    emailCelularLabel.textContent = "Digite seu email ou número de celular";
    emailCelular.classList.remove("loginError");
}