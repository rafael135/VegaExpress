var senha = document.getElementById("senha");
var senhaRepeticao = document.getElementById("verificarSenha");

senha.classList.add("loginError");
senhaRepeticao.classList.add("loginError");
senhaRepeticao.classList.add("is-invalid");
senha.classList.add("is-invalid");

var senhaLabel = document.getElementById("senhaLabel");
var senhaRepeticaoLabel = document.getElementById("verificarSenhaLabel");

senhaLabel.textContent = "Senha não preenchida ou menor que 8 caracteres!";
senhaRepeticaoLabel.textContent = "Senha não preenchida ou menor que 8 caracteres!";

senhaLabel.style.color = "#d81919";
senhaRepeticaoLabel.style.color = "#d81919";

senha.onclick = function(){
    senhaLabel.style.color = "black";
    senhaLabel.textContent = "Senha"; 
    senha.classList.remove("loginError");
};

senhaRepeticao.onclick = function(){
    senhaRepeticaoLabel.style.color = "black";
    senhaRepeticaoLabel.textContent = "Repita a senha"; 
    senhaRepeticao.classList.remove("loginError");
};
