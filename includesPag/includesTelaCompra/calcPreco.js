$(function () {

    $("#btn-finalizar").on("click", function(){
        $.ajax({
            url: 'ActionPHP/registrarCompra.php',
            type: 'POST',
            dataType: 'html',
            cache: false,
            data: {postConfirm: "post"},
            success: function(data){
                console.log(data);
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