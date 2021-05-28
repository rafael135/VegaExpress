    var btnOpt1 = document.getElementsByClassName("btnOpt1");
    var btnOpt2 = document.getElementsByClassName("btnOpt2");
    var btnOpt3 = document.getElementsByClassName("btnOpt3");

    btnOpt1.onclick = function () {
        document.cookie = "optSelected=1";
        window.location.reload();
    };

    btnOpt2.onclick = function () {
        document.cookie = "optSelected=2";
        window.location.reload();
    };

    btnOpt3.onclick = function () {
        document.cookie = "optSelected=3";
        window.location.reload();
    };