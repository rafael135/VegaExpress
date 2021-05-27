var senhaLogin = document.getElementById("senhaLogin");
var senhaLoginLabel = document.getElementById("senhaLoginLabel");

senhaLogin.classList.add("loginError");
senhaLogin.classList.add("is-invalid");

senhaLoginLabel.textContent = "Campo obrigatório!";

senhaLoginLabel.style.color = "#d81919";

senhaLogin.onclick = function(){
    senhaLoginLabel.style.color = "black";
    senhaLoginLabel.textContent = "Digite sua senha";
    senhaLogin.classList.remove("loginError");
}