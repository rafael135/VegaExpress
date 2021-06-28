<head>
	<title>Carrinho</title>
	<link rel="stylesheet" href="includesPag/includesTelaCompra/Estilos.css">
</head>

<?php

use App\Autor;
use App\money_format;
use App\Produto;

$money = new money_format();
?>

<body>
	<div class="container mw-100">
		<div class="row justify-content-center">
			<div class="col-sm-10 col-md-10
				col-lg-10 col-xl-10 text-center p-0 mt-3 mb-2">
				<div class="px-0 pt-4 pb-0 mt-3 mb-3">
					<form class="bg-carrinho" action="ActionPHP/registrarCompra.php" method="POST" id="form">
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
						<fieldset class="bg-light">
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
											<div class="col-sm-6 col-md-7 col-lg-9 mb-3">
												<div class="card card-produto ms-3 me-0 h-100 mb-3">

													<img src="<?php echo ($destinoImg); ?>" alt="Imagem do produto">

													<div class="card-body">
														<h4 class="card-title text-start">Nome do produto: <?php echo ($nomeProduto); ?></h4>
														<button type="button" class="btn btn-svg-delete position-absolute top-0 end-0" data-bs-toggle="modal" data-bs-target="#deletarModal" title="Remover do carrinho">
															<img class="svg svg-btn-delete" src="UIcons/svg/fi-rs-trash.svg">
														</button>
														<div class="modal fade" id="deletarModal" tabindex="-1" aria-labelledby="deletarModalLabel" aria-hidden="true">
															<div class="modal-dialog modal-dialog-centered">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="deletarModalLabel">Confirmação</h5>
																		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																	</div>
																	<div class="modal-body">
																		Tem certeza de que deseja excluir a publicação?
																	</div>
																	<div class="modal-footer">

																		<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
																		<a href="ActionPHP/removerProdutoCarrinho.php?idPub=<?php echo($idProduto); ?>" type="button" class="btn btn-success">Sim</a>

																	</div>
																</div>
															</div>
														</div>

													</div>

												</div>
											</div>

											<div class="col-sm-6 col-md-5 col-lg-3 pb-3">
												<div class="card card-produto ms-1 h-100 mb-3 me-3">
													<div class="card-body">
														<h5 class="card-title text-center">Preço: <?php echo ($money->money_format("%.2n", $valorProduto)); ?></h5>

														<div class="form-floating mb-3 mx-sm-0 mx-md-2 mx-lg-4">
															<input type="number" class="form-control" min="1" max="40" value="1" placeholder="Quantidade" id="quantidadeProduto" name="quantidadeProduto">
															<label for="quantidadeProduto">Quantidade</label>
															<input type="number" id="precoProduto" value="<?php echo ($valorProduto); ?>" hidden>
														</div>


													</div>
												</div>
											</div>




										<?php
										}
										?>
										<div class="col-lg-12">
											<div class="container-fluid border px-3 m-0">



												<table class="table table-bordered table-success table-striped table-responsive-sm table-responsive-md mb-0">
													<thead>
														<tr>
															<th>Subtotal:</th>
															<th>Valor do frete</th>
															<th>Valor Total</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td scope="row"><?php echo ($money->money_format("%.2n", $precoSubTotal)); ?></td>
															<td>R$30,00</td>
															<td><?php echo ($money->money_format("%.2n", $precoSubTotal + 30)); ?></td>
														</tr>
													</tbody>
												</table>


												<input name="precoSubTotal" id="precoSubTotal" value="<?php echo ($precoSubTotal); ?>" hidden>
												<input type="number" id="cepAutor" value="<?php echo ($cepAutor); ?>" hidden>



											</div>
										</div>
								</div>
							</div>
							<div class="container col-sm-12 col-md-10 col-lg-8 pt-4">
								<div class="form-floating mb-3">
									<input type="text" id="cep" class="form-control" aria-label="" placeholder="Verifique o CEP">
									<label for="cep">Por favor, digite seu CEP para continuar</label>
								</div>
								
								<input type="number" id="cepUsr" value="0" hidden>
							</div>
							<div class="container col-sm-12 col-md-2 col-lg-4 pt-0" id="ctnBtnConfirmarCep">
								<!--<a class="btn btn-pesquisa btnConfirmarCep" id="btnCep">Confirmar CEP</a>-->
								
							</div>
							

							<input type="button" name="next-step" id="avancarEndereco" class="next-step" value="Avançar" disabled style="opacity: 0;" />
							<!-- onclick="LoadFrete();" -->

							<input type="number" name="precoTotal" id="precoTotal" hidden>
						<?php
									} else {
						?>
							<p class="display-5 text-blue text-center pt-3 pb-0 mb-0">Você não adicionou nenhum produto ao seu carrinho</p>
						<?php
									}
						?>


						</fieldset>
						<fieldset class="px-3-custom bg-light">
							<!-- Endereço -->
							<div class="container-fluid bg-blue rounded-0 p-0 m-0">
								<p class="text-center text-white fw-bold display-5">Confirme seu endereço</p>
							</div>
							<div class="floating-borderStyle rounded rounded-1 px-4">
								<div class="form-floating m-2 mt-4 mx-2">
									<input type="text" class="form-control mb-3" id="estado" aria-label="Estado">
									<label for="estado">Estado</label>
								</div>

								<div class="form-floating mx-2">
									<input type="text" class="form-control mb-3" id="cidade" aria-label="Cidade">
									<label for="cidade">Cidade</label>
								</div>

								<div class="form-floating mx-2 mb-3">
									<input type="text" class="form-control" id="endereco" placeholder="Endereço">
									<label for="endereco">Endereço</label>
								</div>

								<div class="form-floating mx-2 mb-3">
									<input type="text" class="form-control" id="cepTxt" placeholder="CEP">
									<label for="cepTxt">CEP</label>
								</div>
							</div>

							<input type="button" name="next-step" class="next-step mb-0" value="Avançar" />
							<input type="button" name="previous-step" class="previous-step mb-0" value="Voltar" />
						</fieldset>
						<fieldset class="px-3-custom bg-light">
							<!-- Pagamento -->
							<div class="container-fluid bg-blue rounded-0 p-0 m-0">
								<p class="text-center text-white fw-bold display-5">Pagamento</p>
							</div>
							<div class="floating-borderStyle rounded rounded-1 px-4">
								<div class="form-floating mx-2 my-3">
									<select class="form-select" id="floatingSelect" aria-label="Floating label select example">
										<option value="1" selected>Cartão de crédito</option>
										<option value="2">Bitcoin</option>
										<option value="3">Ethereum</option>
										<option value="4">Cardano</option>
										<option value="5">Monero</option>
										<option value="6">Chainlink</option>
									</select>
									<label for="floatingSelect">Escolha uma forma de pagamento</label>
								</div>
							</div>

							<input type="button" id="btn-finalizar" name="next-step" class="next-step" value="Finalizar" />
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
	<script src="includesPag/includesTelaCompra/calcPreco.js"></script>
</body>