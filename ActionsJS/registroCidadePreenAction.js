var cidade = document.getElementById("cidade");
var cidadeLabel = document.getElementById("cidadeLabel");

cidade.classList.add("loginError");
cidade.classList.add("is-invalid");

cidadeLabel.textContent = "Campo não preenchido!";
cidadeLabel.style.color = "#d81919";

cidade.addEventListener("click", function(){
    cidadeLabel.textContent = "Cidade";
    cidadeLabel.style.color = "black";
    cidade.classList.remove("loginError");
});