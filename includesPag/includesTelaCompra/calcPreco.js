$(function () {

    $("#btn-finalizar").on("click", function(){
        var txtEstado = $("#estado").val();
        var txtCidade = $("#cidade").val();
        var txtNumero = $("#numero").val();
        var txtEndereco = $("#endereco").val();
        var txtCep = $("#cepTxt").text();

        console.log(txtEstado);
        console.log(txtCidade);
        console.log(txtNumero);
        console.log(txtEndereco);
        console.log(txtCep);

        $.ajax({
            url: 'ActionPHP/registrarCompra.php',
            type: 'POST',
            dataType: 'html',
            cache: false,
            data: {postConfirm: "post",
            Estado: txtEstado,
            Cidade: txtCidade,
            Endereco: txtEndereco,
            Numero: txtNumero,
            Cep: txtCep},
            success: function(data){
                var toast = '<div class="toast-container position-absolute bottom-0 end-0 p-3">' +
                '<div class="toast" id="toastCompra" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">' +
                    '<div class="toast-header">' +
                        '<img src="img/btns/done.svg" class="svg svg-success" alt="Sucesso!">' +
                        '<strong class="me-auto">Sucesso</strong>' +
                        '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                    '</div>' +
                    '<div class="toast-body text-green">' +
                        'Compra feita com sucesso.' +
                    '</div>' +
                '</div>' +
            '</div>';
                $("body").append(toast);
                $("#toastCompra").toast("show");
                //console.log(data);
            },beforeSend: function () {
                
            }, error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText + "\n" + textStatus.toString + "\n" + errorThrown.toString);
            }
        });
      })

      










    /*$("#quantidadeProduto[]").on("change", function(){
        var precos = $("#precoProduto").each(function () {
            return $(this).val;
        });

        var quantidadeProdutos = $("quantidadeProdutos").each(function(){
            return $(this).val;
        })

        $.ajax({
            url: 'includesPag/includesTelaCompra/PhpAjaxFiles/recalcValor.php',
            type: 'POST',
            dataType: 'html',
            cache: false,
            data: {
                precos: precos,
                quantidadeProdutos: quantidadeProdutos
            },
            success: function (data) {
                console.log(data);
            }, beforeSend: function () {

            }, error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseText + "\n" + textStatus.toString + "\n" + errorThrown.toString);
            }
        
        });
    });*/

});