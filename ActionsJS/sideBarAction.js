    var menu_btn = document.querySelector("#menu-btn")
    var sidebar = document.querySelector("#sidebar")
    var container = document.querySelector(".my-container")
    menu_btn.addEventListener("click", () => {
        
        // Identifica o elemento com o id "menu"
        var menu = document.querySelector("#menu")
        // Essas duas variáveis são os caminhos para as imagens
        var menu_fechado = "img/menu.svg"
        var menu_aberto = "img/menu_open.svg"

        // Se o atributo src do menu = menu_fechado
        if(menu.getAttribute("src") == menu_fechado){
            // Seta o atributo src como menu_aberto
            menu.setAttribute("src", menu_aberto)
        }else{
            // Seta o atributo src como menu_fechado
            menu.setAttribute("src", menu_fechado)
        }

        // Mostra a sidebar
        sidebar.classList.toggle("active-nav")
        // Evita que o container Fique encima da página
        container.classList.toggle("active-cont")
    });

var btnConta = document.getElementById("btn-conta");

btnConta.addEventListener("click", () => {
    var btnContaTxt = document.getElementById("btn-conta-txt");
    if(btnContaTxt.textContent == ""){
        btnContaTxt.textContent = "Conta";
    }else{
        btnContaTxt.textContent = "";
    }
})

