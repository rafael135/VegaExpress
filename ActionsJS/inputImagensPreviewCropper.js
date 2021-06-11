

$(function () {
    var coordX = document.getElementById("coordX");
    var coordY = document.getElementById("coordY");
    var coordWidth = document.getElementById("coordWidth");
    var coordHeight = document.getElementById("coordHeight");


    var input = document.getElementById("mudarFoto");

    input.onchange = function () {


        var image = document.getElementById('imagePreview');
        var cropBoxData;
        var canvasData;
        var cropper;
        $('#mudarFotoPerfil').modal({ show: false })
        $("#mudarFotoPerfil").modal('show');




        $('#mudarFotoPerfil').on('shown.bs.modal', function () {



            var options = {
                aspectRatio: 1 / 1,
                preview: '#imagePreview',
                viewMode: 1,
                minContainerWidth: 600,
                minContainerHeight: 500,
                guides: true,
                scalable: false,
                
                ready: function (e) {
                    cropper.getCroppedCanvas();

                    cropper.getCroppedCanvas({
                        width: 40,
                        height: 40,
                        minWidth: 40,
                        minHeight: 40,
                        maxWidth: 400,
                        maxHeight: 400,
                        fillColor: '#fff',
                        imageSmoothingEnabled: true,
                        imageSmoothingQuality: 'high',
                    });

                    console.log(e.type);
                },
                cropstart: function (e) {
                    console.log(e.type, e.detail.action);
                },
                cropmove: function (e) {
                    console.log(e.type, e.detail.action);
                },
                cropend: function (e) {
                    console.log(e.type, e.detail.action);
                },
                crop: function (e) {
                    var data = e.detail;

                    console.log(e.type);

                    $(coordX).attr("value", Math.round(data.x));
                    $(coordY).attr("value", Math.round(data.y));
                    $(coordHeight).attr("value", Math.round(data.height));
                    $(coordWidth).attr("value", Math.round(data.width));

                    

                    
                }

            }

            cropper = new Cropper(image, options);
            
            

        }).on('hidden.bs.modal', function () {
            cropper.destroy();
        })


    }

    var btnCloseModal = document.getElementById("closeModal");

    btnCloseModal.onclick = function () {
        cropper.destroy();
        var img = document.getElementById("imagePreview");
        img.removeAttribute("src");
    }
})



