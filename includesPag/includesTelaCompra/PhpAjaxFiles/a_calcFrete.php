<?php


 $params = array([
    'sCepOrigem' => trim($_POST['cep_origem']),
    'sCepDestino' => trim($_POST['cep_destino']),
    'sCdMaoPropria' => 'n',
    'nVlValorDeclarado' => trim($_POST['valor_total']),
    'sCdAvisoRecebimento' => 'n',
    'StrRetorno' => 'xml',
    'nCdServico' => '41106',
    'nCdFormato' => '1'
 ]);

 function precoFrete($parametros){

   var_dump($parametros);
 
   // Código e senha da empresa, se você tiver contrato com os correios, se não tiver deixe vazio.
   $parametros['nCdEmpresa'] = '';
   $parametros['sDsSenha'] = '';
   
   // CEP de origem e destino. Esse parametro precisa ser numérico, sem "-" (hífen) espaços ou algo diferente de um número.
   //$parametros['sCepOrigem'] = '96010140';
   //$parametros['sCepDestino'] = '02460000';
   
   // O peso do produto deverá ser enviado em quilogramas, leve em consideração que isso deverá incluir o peso da embalagem.
   $parametros['nVlPeso'] = '1';
   
   // O formato tem apenas duas opções: 1 para caixa / pacote e 2 para rolo/prisma.
   //$parametros['nCdFormato'] = '1';
   
   // O comprimento, altura, largura e diametro deverá ser informado em centímetros e somente números
   $parametros['nVlComprimento'] = '16';
   $parametros['nVlAltura'] = '5';
   $parametros['nVlLargura'] = '15';
   $parametros['nVlDiametro'] = '0';
   
   // Aqui você informa se quer que a encomenda deva ser entregue somente para uma determinada pessoa após confirmação por RG. Use "s" e "n".
   //$parametros['sCdMaoPropria'] = 's';
   
   // O valor declarado serve para o caso de sua encomenda extraviar, então você poderá recuperar o valor dela. Vale lembrar que o valor da encomenda interfere no valor do frete. Se não quiser declarar pode passar 0 (zero).
   //$parametros['nVlValorDeclarado'] = '200';
   
   // Se você quer ser avisado sobre a entrega da encomenda. Para não avisar use "n", para avisar use "s".
   //$parametros['sCdAvisoRecebimento'] = 'n';
   
   // Formato no qual a consulta será retornada, podendo ser: Popup – mostra uma janela pop-up | URL – envia os dados via post para a URL informada | XML – Retorna a resposta em XML
   //$parametros['StrRetorno'] = 'xml';
   
   // Código do Serviço, pode ser apenas um ou mais. Para mais de um apenas separe por virgula.
   //$parametros['nCdServico'] = '40010,41106';


   $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?";
   $url .= "&nCdEmpresa=";
   $url .= "&sDsSenha=";
   $url .= "&nCdServico=" . $parametros['nCdServico'];
   $url .= "&sCepOrigem=" . $parametros['sCepOrigem'];
   $url .= "&sCepDestino=" . $parametros['sCepDestino'];
   $url .= "&nVlPeso=2000";
   $url .= "&nCdFormato=1";
   $url .= "&nVlComprimento=20";
   $url .= "&nVlAltura=6";
   $url .= "&nVlLargura=20";
   $url .= "&nVlDiametro=0";
   $url .= "&sCdMaoPropria=n";
   $url .= "&nVlValorDeclarado=" . $parametros['nVlValorDeclarado'];
   $url .= "&sCdAvisoRecebimento=s";
   $url .= "&StrRetorno=xml";
   $url .= "nIndicaCalculo=3";
   
   $xml = simplexml_load_file($url);

   return $xml->cServico;
   /*$parametros = http_build_query($parametros);
   $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
   $curl = curl_init($url.'?'.$parametros);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $dados = curl_exec($curl);
   $dados = simplexml_load_string($dados);
   var_dump($dados);
   
   foreach($dados->cServico as $linhas) {
      if($linhas->Erro == 0) {
         echo $linhas->Codigo;
         echo $linhas->Valor;
         echo $linhas->PrazoEntrega.' Dias';
         return $linhas;
      }else {
         echo $linhas->MsgErro;
         return false;
      }
   }*/
}


$dados = precoFrete($params);
echo($dados->Valor);
?>