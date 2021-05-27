var verificarSenha = document.getElementById("verificarSenha");
var senha = document.getElementById("senha");

verificarSenha.classList.add("loginError");
senha.classList.add("loginError");
verificarSenha.classList.add("is-invalid");
senha.classList.add("is-invalid");

var senhaLabel = document.getElementById("senhaLabel");
var verificarSenhaLabel = document.getElementById("verificarSenhaLabel");

verificarSenhaLabel.textContent = "Senhas diferentes!";
senhaLabel.textContent = "Senhas diferentes!";

verificarSenhaLabel.style.color = "#d81919";
senhaLabel.style.color = "#d81919";

verificarSenha.onclick = function(){
    verificarSenhaLabel.style.color = "black";
    verificarSenhaLabel.textContent = "Repita a senha"; 
    verificarSenha.classList.remove("loginError");
};

senha.onclick = function(){
    senhaLabel.style.color = "black";
    senhaLabel.textContent = "Senha"; 
    senha.classList.remove("loginError");
};
