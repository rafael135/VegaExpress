var celular = document.getElementById("celular");

celular.classList.add("loginError");
celular.classList.add("is-invalid");

var celularLabel = document.getElementById("celularLabel");

celularLabel.textContent = "Número de celular não preenchido ou incorreto!";

celularLabel.style.color = "#d81919";

celular.onclick = function(){
    celularLabel.style.color = "black";
    celularLabel.textContent = "Digite seu email ou número de celular";
    celular.classList.remove("loginError");
};
