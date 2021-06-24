function LoadFrete(){
    var cep_destino = $("#cepTxt").val();
    var cep_origem = $("#cepAutor").val();
    



    $.ajax({
        url: 'PhpAjaxFiles/a_calcFrete.php',
        type: 'POST',
        dataType: 'html',
        cache: false,
        data: {cep_destino: cep_destino,
        cep_origem: cep_origem},
        success: function(data){
            console.log(data);
        },beforeSend: function () {

        }, error: function (jqXHR, textStatus, errorThrown) {
            console.log("erro");
        }
    });
}