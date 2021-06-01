<div class="container-fluid mt-3">
    <div class="row mx-1 mb-2 g-0">
        <div class="col-12 border-0">

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">




                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <span class="material-icons fs-3 text-blue m-1">search</span>
                            <p class="text-center w-100 fs-4 text-blue m-1">Expandir barra de pesquisa</p>
                        </button>



                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body accordion-body-custom p-0 pt-0">
                            <form class="p-0 m-0" method="POST" action="ActionPHP/pesquisarPub.php">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control rounded-0" id="txtPesquisa" name="txtPesquisa" placeholder="Pesquisar por">
                                            <label for="txtPesquisa">Pesquisar por</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-1 px-0 d-flex justify-content-center align-items-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="checkFrete" name="checkFrete">
                                            <label class="form-check-label text-blue  fw-bold" for="checkFrete">Frete grátis</label>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-2 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                        <div class="container-fluid container-divisor w-100 p-0 m-0 h-100">
                                            <div class="btn-group no-outline text-center d-flex ps-3 pe-3 rounded-0 h-100 justify-content-center align-items-center" role="group" aria-label="Basic radio toggle button group">
                                                <input type="radio" class="btn-check no-outline" name="radioCondicao" value="novo" id="btnNovo" autocomplete="off" checked>
                                                <label class="btn btn-outline-primary no-outline" for="btnNovo">Novo</label>

                                                <input type="radio" class="btn-check no-outline" name="radioCondicao" value="usado" id="btnUsado" autocomplete="off">
                                                <label class="btn btn-outline-primary no-outline" for="btnUsado">Usado</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-4 col-lg-3 ps-0 ms-0 me-0">
                                        <button type="submit" class="btn btn-pesquisa w-100 h-100"><span class="material-icons blue m-1">search</span></button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>




                <!--<div class="accordion" id="accordionForm">
                    <div class="accordion-item border-0">
                        <h2 class="accordion-header" id="collapseForm">
                            <form method="POST" class="mx-3 my-3" action="">
                                <div class="input-group p-0 border">
                                    <input type="text" class="form-control" placeholder="Pesquise algo" aria-label="Pesquisa" id="pesquisa" name="pesquisa">
                                    <span class="input-group-text p-0" id="textoPesquisa"><button type="submit" class="btn rounded-0 h-100 w-100 text-center align-items-center"><span class="text-center material-icons blue" style="font-size:32px;">search</span></button></span>
                                    <span class="input-group-text p-0"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseForm" aria-expanded="false" aria-controls="collapseForm"></button></span>
                                </div>
                            </form>

                        </h2>
                        <div id="collapseForm" class="accordion-collapse collapse p-0" aria-labelledby="headingOne" data-bs-parent="#accordionForm">
                            <div class="accordion-body">

                            </div>
                        </div>
                    </div>
                </div>-->



            </div>
        </div>
    </div>
</div>