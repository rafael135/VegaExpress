$(function () {
    function readImage() {
        if (this.files && this.files[0]) {
            var file = new FileReader();
            file.onload = function (e) {
                $("#imagePreview").attr("src", e.target.result);
                $("#modal-input").addClass("modal-fullscreen");
            };
            file.readAsDataURL(this.files[0]);
        }
    }
    var input = document.getElementById("mudarFoto");

    input.addEventListener('change', readImage, false);
});