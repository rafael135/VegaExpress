<head>
	<title>Carrinho</title>
	<link rel="stylesheet" href="includesPag/includesTelaCompra/Estilos.css">
	<link rel="stylesheet" href="includesPag/includesCarrinho/carrinho.css">
</head>


<?php
	if(isset($_SESSION['conteudoCarrinho'])){
		$itemsCarrinho = $_SESSION['conteudoCarrinho'];
		foreach($itemsCarrinho as $item){
			
		}
	}
?>

<body>
	<div class="container mw-100">
		<div class="row justify-content-center">
			<div class="col-11 col-sm-9 col-md-7
				col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
				<div class="px-0 pt-4 pb-0 mt-3 mb-3">
					<form id="form">
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
							<!-- Carrinho -->
							<div class="card mb-3" style="max-width: 460px;">
								<div class="row g-0">
									<div class="col-md-4">
										<img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRQGkUoNvncb3rvl3vRGKwSak6rIwJPcrQgHIEmsdkysc3HQDDo0m3OIg0R_bhD3UWXgW9d4pn204I&usqp=CAc"
											alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h4 class="card-title">PC Gamer GT 730</h4>
											<h5 class="card-text mt-4">R$3.780,00</h5>
										</div>
									</div>
								</div>
							</div>

							<div class="card mb-3" style="max-width: 460px;">
								<div class="row g-0">
									<div class="col-md-4">
										<img src="https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcRQGkUoNvncb3rvl3vRGKwSak6rIwJPcrQgHIEmsdkysc3HQDDo0m3OIg0R_bhD3UWXgW9d4pn204I&usqp=CAc"
											alt="...">
									</div>
									<div class="col-md-8">
										<div class="card-body">
											<h4 class="card-title">PC Gamer GT 730</h4>
											<h5 class="card-text mt-4">R$3.780,00</h5>
										</div>
									</div>
								</div>
							</div>

							<div class="input-group">
								<input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" placeholder="Verifique o Frete">
								<span class="input-group-text">R$</span>
								<span class="input-group-text">30.00</span>
							  </div>

							<input type="button" name="next-step" class="next-step" value="Avançar" />
						</fieldset>
						<fieldset>
							<!-- Endereço -->
							<h2 class="mb-4">Informe seu endereço</h2>
							<div class="form-floating">
								<select class="form-select mb-3" id="floatingSelect"
									aria-label="Floating label select example">
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
								<label for="floatingSelect">Estado</label>
							</div>

							<div class="form-floating">
								<select class="form-select mb-3" id="floatingSelect"
									aria-label="Floating label select example">
									<option value="1">One</option>
									<option value="2">Two</option>
									<option value="3">Three</option>
								</select>
								<label for="floatingSelect">Cidade</label>
							</div>

							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="floatingInput"
									placeholder="Informe seu endereço">
								<label for="floatingInput">Endereço</label>
							</div>

							<div class="form-floating mb-3">
								<input type="number" class="form-control" id="floatingInput"
									placeholder="Informe seu endereço">
								<label for="floatingInput">CEP</label>
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
</body>