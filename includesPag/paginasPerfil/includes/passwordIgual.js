$(function () {


    var passwordTroca = $("#passwordTroca");
    var passwordTrocaLabel = $("#passwordTrocaLabel");

    var passwordTrocaConfirmar = $("#passwordTrocaConfirmar");
    var passwordTrocaConfirmarLabel = $("#passwordTrocaConfirmarLabel");

    var txtConfirmar = "";
    var txtTroca = "";

    passwordTrocaConfirmar.on("keyup", null, verificar);

    passwordTroca.on("keyup", null, verificar);


    function verificar() {
        txtConfirmar = passwordTrocaConfirmar.val();
        txtTroca = passwordTroca.val();

        console.log("Entrou");

        if (txtConfirmar != txtTroca) {
            //passwordTrocaConfirmarLabel.removeClass("text-success");
            //passwordTrocaConfirmarLabel.addClass("text-danger");
            //$(passwordTrocaConfirmarLabel).text("Senhas direntes!");
            passwordTrocaConfirmar.removeClass("is-valid");
            passwordTrocaConfirmar.addClass("is-invalid");



            //passwordTrocaLabel.removeClass("text-success");
            //passwordTrocaLabel.addClass("text-danger");
            //$(passwordTrocaLabel).text("Senhas direntes!");
            passwordTroca.removeClass("is-valid");
            passwordTroca.addClass("is-invalid");

        } else if((txtConfirmar == "") || (txtTroca == "")){

        } else{

            //passwordTrocaConfirmarLabel.removeClass("text-danger");
            //passwordTrocaConfirmarLabel.addClass("text-success");
            //$(passwordTrocaConfirmarLabel).text("Senhas iguais");
            passwordTrocaConfirmar.removeClass("is-invalid");
            passwordTrocaConfirmar.addClass("is-valid");



            //passwordTrocaLabel.removeClass("text-danger");
            //passwordTrocaLabel.addClass("text-success");
            //$(passwordTrocaLabel).text("Senhas iguais");
            //passwordTrocaConfirmarLabel.addClass("text-success");
            passwordTroca.removeClass("is-invalid");
            passwordTroca.addClass("is-valid");

        }
    }


});