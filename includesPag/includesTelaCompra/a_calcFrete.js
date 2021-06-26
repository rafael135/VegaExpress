function LoadFrete(){
    var cep_destino = $("#cepTxt").val();
    var cep_origem = $("#cepAutor").val();
    var valor_total = $("#precoSubTotal").val();
    



    $.ajax({
        url: 'includesPag/includesTelaCompra/PhpAjaxFiles/a_calcFrete.php',
        type: 'POST',
        dataType: 'html',
        cache: false,
        data: {cep_destino: cep_destino,
        cep_origem: cep_origem,
        valor_total: valor_total},
        success: function(data){
            $("#val-freteTxt").val("Frete: " + data);
            console.log(data);
        },beforeSend: function () {
            
        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.responseText + "\n" + textStatus.toString + "\n" + errorThrown.toString);
        }
    });
}