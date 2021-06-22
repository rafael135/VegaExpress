$("#textoComent").on("input", function () {
    $("#textoComent").css("height", ""); //reset the height
    $("#textoComent").css("height", Math.min($("#textoComent").prop('scrollHeight'), 300) + "px");
});