-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Jun-2021 às 05:10
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vegaexpress`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(255) NOT NULL,
  `idAutor` int(255) NOT NULL,
  `idProduto` int(255) NOT NULL,
  `titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `txtComentario` text COLLATE utf8_unicode_ci NOT NULL,
  `avaliacao` tinyint(255) NOT NULL,
  `dataPublicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(255) NOT NULL COMMENT 'ID que identifica o pedido',
  `idProduto` int(255) NOT NULL COMMENT 'ID para identificar o produto e "puxar" suas informações',
  `idUsuario` int(255) NOT NULL COMMENT 'ID do usuário que fez o pedido',
  `tituloProduto` varchar(65) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome do produto',
  `precoProduto` double NOT NULL COMMENT 'Preço do pedido',
  `endereco` text COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `dataFrete` date NOT NULL,
  `dataPublicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `titulo` varchar(65) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Título do produto',
  `idAutor` int(255) NOT NULL COMMENT 'ID do autor da publicação, para puxar os dados depois',
  `idProduto` int(255) NOT NULL,
  `categoria` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Descrição do produto',
  `preco` float NOT NULL COMMENT 'Preço do produto',
  `vendas` int(11) NOT NULL DEFAULT 0 COMMENT 'Vendas do produto',
  `frete` tinyint(255) NOT NULL DEFAULT 0,
  `avaliacao` tinyint(255) NOT NULL DEFAULT 0,
  `dataPublicacao` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data em que o produto foi publicado',
  `condicao` tinyint(255) NOT NULL DEFAULT 0,
  `imagens` text COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(255) NOT NULL,
  `idAutor` int(255) NOT NULL,
  `tituloServico` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `preco` double NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Nenhuma',
  `categoria` int(11) NOT NULL,
  `dataPublicacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL COMMENT 'ID identificador do usuário',
  `nome` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nome completo do usuário',
  `email` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'e-mail registrado do usuário',
  `senha` varchar(60) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Senha do usuário',
  `imgPerfil` varchar(20) COLLATE utf8_unicode_ci DEFAULT '0' COMMENT 'Imagem de perfil do usuário',
  `endereco` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Endereço do usuário',
  `cep` int(255) NOT NULL,
  `celular` varchar(14) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Número de celular do usuário',
  `contaVerificada` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false' COMMENT 'Indica se a conta foi verificada via e-mail ou celular',
  `totalVendas` int(255) NOT NULL DEFAULT 0 COMMENT 'Total de vendas do usuário',
  `notaVendedor` int(255) NOT NULL DEFAULT 0,
  `dataRegistrada` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Data em que o usuário se registrou no site'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ID que identifica o pedido', AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT COMMENT 'ID identificador do usuário', AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
