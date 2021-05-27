<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Carrinho de compras</title>

    <style>
        .container-fluid {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        p.cart {}

        .row.cart {
            max-width: 100%;
        }

        .card-img-top {
            height: 300px;
            width: 300px;
        }
    </style>

</head>

<body background="img/carrinho/fundo.svg">



    <div class="row cart">
        <div class="col-10 mx-auto position-absolute top-50 start-50 translate-middle">
            <div class="container-fluid p-0 border border-2 mx-auto bg-light">
                <div class="container-fluid p-0 m-0 bg-blue">
                    <h2 class="p-3 text-center text-white top-50"><b>Aqui estão seus produtos!</b></h2>
                </div>

                <div class="row cart mx-4 mt-4 mb-2">
                    <div class="card">
                        <div class="row g-0 m-3">
                            <div class="col-4">
                                <img class="card-img-top" src="https://img.kalunga.com.br/fotosdeprodutos/222503z_1.jpg" alt="">
                            </div>
                            <div class="col-8">
                                <div class="card-body ms-4">
                                    <h3 class="text-start">Notebook Lenovo 15"</h3> <br>
                                    <h4 class="card-title">10x sem juros</h4>
                                    <p class="cart card-text">R$2.500,00 à vista</p>
                                </div>
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include __DIR__ . '/../vendor/autoload.php';

                use App\money_format;


                $money = new money_format();
                setlocale(LC_MONETARY, 'pt_BR.UTF8');
                ?>

                <div class="row cart mb-2">
                    <div class="col-3 ms-auto">
                        <div class="container-fluid justify-content-center">

                            <blockquote class="blockquote h-100 w-100 align-middle">
                                <p class="cart text-center">Total: <?php echo ($money->money_format("%.2n", 2500)); ?></p>
                            </blockquote>

                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating">
                            <select class="form-select" id="selectParcela">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                            <label for="selectParcela">Parcelar por</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-outline-success h-100 w-100">Finalizar compra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Bootstrap JavaScript-->
    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>