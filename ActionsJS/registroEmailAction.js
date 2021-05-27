var email = document.getElementById("email");

email.classList.add("loginError");
email.classList.add("is-invalid");

var emailLabel = document.getElementById("emailLabel");

emailLabel.textContent = "E-mail não preenchido ou incorreto!";

emailLabel.style.color = "#d81919";

email.onclick = function(){
    emailLabel.style.color = "black";
    emailLabel.textContent = "E-Mail";
    email.classList.remove("loginError");
};
