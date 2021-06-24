<head>
	<title>Carrinho</title>
	<link rel="stylesheet" href="includesPag/includesTelaCompra/Estilos.css">
</head>

<?php

use App\Autor;
use App\money_format;
use App\Produto;
?>

<body>
	<div class="container mw-100">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10
				col-lg-10 col-xl-10 text-center p-0 mt-3 mb-2">
				<div class="px-0 pt-4 pb-0 mt-3 mb-3">
					<form class="bg-carrinho" id="form">
						<ul id="progressbar">
							<li class="active" id="step1">
								<strong>Carrinho</strong>
							</li>
							<li id="step2"><strong>Endereço de entrega</strong></li>
							<li id="step3"><strong>Pagamento</strong></li>
							<li id="step4"><strong>Finalização</strong></li>
						</ul>
						<div class="progress">
							<div class="progress-bar"></div>
						</div> <br>
						<fieldset>
							<?php
							if (isset($_SESSION['conteudoCarrinho'])) {
							?>
								<div class="container-fluid bg-blue rounded-0 p-0 m-0">
									<p class="text-center text-white fw-bold display-5">Produtos no carrinho:</p>
								</div>
							<?php
							}
							?>
							<div class="container-fluid p-0 m-0">

								
								<div class="row">


									<!-- Carrinho -->
									<?php



									if (isset($_SESSION['conteudoCarrinho'])) {
										$precoSubTotal = 0.0;
										$itemsCarrinho = $_SESSION['conteudoCarrinho'];

										foreach ($itemsCarrinho as $item) {

											$money = new money_format();
											$idProduto = $item;
											$produto = new Produto();
											$produto = $produto->getProdutoId($idProduto);
											$nomeProduto = $produto[0]['titulo'];
											$valorProduto = doubleval($produto[0]['preco']);
											$produtoIdAutor = $produto[0]['idAutor'];
											$imgProduto = $produto[0]['imagens'];
											$precoSubTotal += $valorProduto;
											$informacoesAutor = new Autor();
											$cepAutor = $informacoesAutor->getInformacoesAutor($produtoIdAutor);
											//var_dump($enderecoCompleto[5]);
											$cepAutor = $cepAutor[6];
											//var_dump($cepAutor);
											$destinoImg = "";
											if ($imgProduto != "") {
												$destinoImg = "UsrImg/$produtoIdAutor/Produtos/$idProduto/$imgProduto";
											} else {
												$destinoImg = "img/imgPadraoProduto.png";
											}
									?>
											<div class="col-lg-6 mb-3">
												<div class="card ms-3 me-0 h-100 mb-3">

													<img src="<?php echo ($destinoImg); ?>" alt="Imagem do produto">

													<div class="card-body">
														<h4 class="card-title text-start">Nome do produto: <?php echo ($nomeProduto); ?></h4>

													</div>

												</div>
											</div>

											<div class="col-lg-2">
												<div class="card ms-1 mb-3">
													<div class="card-body">
														<h5 class="card-title text-center">Preço: <?php echo ($money->money_format("%.2n", $valorProduto)); ?></h5>

														<div class="form-floating mb-3">
															<input type="number" class="form-control" min="1" max="40" value="1" placeholder="Quantidade" id="quantidadeProduto" name="quantidadeProduto">
															<label for="quantidadeProduto">Quantidade</label>
														</div>
													</div>
												</div>
											</div>




										<?php
										}
										?>
										<div class="col-lg-4 position-absolute top-0 end-0 ps-precoTotal">
											<div class="container-fluid border p-0 m-0">
												<p class="mb-0 ms-4 text-start">Subtotal: <?php echo ($money->money_format("%.2n", $precoSubTotal)); ?></p>
												<input name="precoSubTotal" id="precoSubTotal" value="<?php echo ($precoSubTotal); ?>" hidden>
												<input type="number" id="cepAutor" value="<?php echo($cepAutor); ?>" hidden>
												<p id="val-freteTxt" class="mb-0 ms-4 text-start">Frete: R$0,00</p>
											</div>
										</div>
								</div>
							</div>
							<div class="container col-sm-4 pt-4">
								<div class="input-group">
									<input type="text" id="cep" class="form-control" aria-label="" placeholder="Verifique o Frete">
									<input type="number" id="cepUsr" value="0" hidden>
									<span class="input-group-text">R$</span>
									<span class="input-group-text">0.00</span>
								</div>
							</div>

							<input type="button" name="next-step" id="avancarEndereco" onclick="LoadFrete();" class="next-step" value="Avançar" />

							<input type="number" name="precoTotal" id="precoTotal" hidden>
						<?php
									} else {
						?>

						<?php
									}
						?>


						</fieldset>
						<fieldset>
							<!-- Endereço -->
							<h2 class="mb-4">Informe seu endereço</h2>
							<div class="form-floating">
								<input type="text" class="form-control mb-3" id="estado" aria-label="Estado">
								<label for="estado">Estado</label>
							</div>

							<div class="form-floating">
								<input type="text" class="form-select mb-3" id="cidade" aria-label="Cidade">
								<label for="cidade">Cidade</label>
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="endereco" placeholder="Endereço">
								<label for="endereco">Endereço</label>
							</div>

							<div class="form-floating mb-3">
								<input type="number" class="form-control" id="cepTxt" placeholder="Informe seu endereço">
								<label for="cepTxt">CEP</label>
							</div>

							<input type="button" name="next-step" class="next-step" value="Avançar" />
							<input type="button" name="previous-step" class="previous-step" value="Voltar" />
						</fieldset>
						<fieldset>
							<!-- Pagamento -->
							<h2 class="mb-4">Pagamento</h2>

							<div class="form-floating">
								<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
									<option selected></option>
									<option value="1">Bitcoin</option>
									<option value="2">Ethereum</option>
									<option value="3">Cardano</option>
									<option value="4">Monero</option>
									<option value="5">Chainlink</option>
								</select>
								<label for="floatingSelect">Escolha uma forma de pagamento</label>
							</div>

							<input type="button" name="next-step" class="next-step" value="Finalizar" />
							<input type="button" name="previous-step" class="previous-step" value="Voltar" />
						</fieldset>
						<fieldset>
							<!-- Mensagem de Finalização -->
							<div class="finish">
								<h2 class="text text-center">
									<strong>COMPRA FINALIZADA!</strong>
								</h2>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="includesPag/includesTelaCompra/step.js"></script>
	<script src="includesPag/includesTelaCompra/cep.js"></script>
	<script src="includesPag/includesTelaCompra/a_calcFrete.js"></script>
</body>